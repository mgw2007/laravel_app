<?php
namespace App\Library\Services\Checkr;

use Lyal\Checkr\Client;
use App\Driver;
use App\Library\Services\Checkr\Exceptions\ReportCandidateIdMissing;
use Lyal\Checkr\Exceptions\Client\BadRequest;
use Doctrine\DBAL\Exception\DriverException;
use App\Exceptions\Model\CreateDriverException;

final class DriverChecker implements DriverCheckrInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @var Driver
     * @return void
     */
    public function applyDriverCheker(Driver $driver): void
    {
        try {

            $this->addDrivercandidate($driver);
            $this->addDriverReport($driver);
        } catch (BadRequest $e) {
            throw new CreateDriverException($e->getMessage());
        }
    }

    /**
     * @var Driver
     * @return void
     */
    private function addDrivercandidate(Driver $driver): void
    {
        $result = $this->client->candidate([
            'first_name' => $driver->name_first,
            'last_name' => $driver->name_last,
            'middle_name' => $driver->name_middle,
            'no_middle_name' => $driver->name_middle ? false : true,
            'driver_license_number' => $driver->driver_license_number,
            'driver_license_state' => $driver->driver_license_state,
            'dob' => $driver->driver_date_of_birth,
            'email' => config('services.checkr.candidate.email'),
        ])->create();
        $driver->candidate_id = $result->id;
    }

    /**
     * @var Driver
     * @return void
     * @throws  ReportCandidateIdMissing
     */
    private function addDriverReport(Driver $driver): void
    {
        if ($driver->candidate_id) {
            $report = $this->client->report([
                'package' => config('services.checkr.report.package'),
                'candidate_id' => $driver->candidate_id
            ]);
            // solving for issue in https://github.com/lyal/checkr/issues/13
            $report->setFields(array_merge($report->getFields(), [
                'municipal_criminal_search_ids',
                'pointer_state_criminal_search_ids'
            ]));
            $result = $report->create();
            $driver->report_id = $result->id;
        } else {
            throw new ReportCandidateIdMissing;
        }
    }
}
