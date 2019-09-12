$(".vin_lookup").click(function (e) {
    let form = $(this).parents('form');
    let val = form.find("#vehicle_id_number").val();
    val = val.trim();

    if (val) {
        form.find(".vin_lookup").hide();
        form.find("#vin_lookup_disable").show();
        form.find("#vin_year").val("");
        form.find("#vin_make").val("");
        form.find("#vin_model").val("");
        $.ajax({
            url: `https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVinValues/${val}?format=json`,
            success: res => {
                let Results = res.Results;
                if (Results[0]) {
                    form.find("#vin_year").val(Results[0].ModelYear);
                    form.find("#vin_make").val(Results[0].Make);
                    form.find("#vin_model").val(Results[0].Model);
                }

                form.find(".vin_lookup").show();
                form.find("#vin_lookup_disable").hide();
            }
        });
    }
});
var datez = new Date();
datez.setDate(datez.getDate() + 1);
datez = new Date(datez.getFullYear() - 18, datez.getMonth(), 1);

$('#driver_date_of_birth').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#driver_date_of_hire').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#addTransportaionSubmissionFile').click(function () {
    $('#addFile').click()
})
$('#addFile').change(function () {
    const startUpload = () => {
        $('#addTransportaionSubmissionFile').hide()
        $('#uploadTransportaionSubmissionFile').show()
        $("#addTransportaionSubmissionFileErrorFileSize").hide();
        $("#addTransportaionSubmissionFileErrorFileType").hide();
    }
    const finishUpload = () => {
        $('#addTransportaionSubmissionFile').show()
        $('#uploadTransportaionSubmissionFile').hide()
        $('#addFile').val("")
        $('#addFileName').val("")

    }
    startUpload()
    var file_size = $(this)[0].files[0].size;
    var file_name = $(this)[0].files[0].name;
    var file_name_pieces = file_name.split(".");
    var file_type = file_name_pieces[file_name_pieces.length - 1]
    if (file_size > MAX_UPLOAD_FILE_SIZE) { // max size 20m 
        $("#addTransportaionSubmissionFileErrorFileSize").show();
        finishUpload()
        return false;
    }
    //check types
    if (!["png", "jpg", "jpeg", "pdf", "xlsx", "xls", "doc", "docs", "csv"].includes(file_type.toLowerCase())) { // max size 20m 
        $("#addTransportaionSubmissionFileErrorFileType").show();
        finishUpload()
        return false;
    }
    $('#addFileName').val(file_name)
    // add file


    $.ajax({
        url: $("#addFileForm").attr('action'),
        method: "POST",
        data: new FormData($("#addFileForm")[0]),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: (data) => {
            $('#transportaionSubmissionFiles').prepend(`
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="${data.deleteLink}" class="btn btn-link  btn-sm removeFile" style="color: #e3342f">
                                <i class="fa fa-times"></i>
                            </a>
                            <a href="${data.downloadLink}" target="_blank">${file_name}</a>
                        </div>
                    </div>
                    `)
            finishUpload()
        },
        error: (data) => {
            $("#addTransportaionSubmissionFileErrorFileType").show();
            finishUpload()
        }
    });

})
$('#transportaionSubmissionFiles').on("click", ".removeFile", function () {
    if (confirm("Are you sure ?")) {

        $.ajax({
            url: $(this).attr('href'),
            data: {
                _token: $("#addFileForm").find("[name=_token]").val(),
            },
            method: "DELETE",
            success: () => {
                $(this).parents(".row:first").remove();
            }
        })
    }
    return false
})

let sample = {
    Count: 131,
    Message: "Results returned successfully",
    SearchCriteria: "VIN(s): 1FUJGLDR9CSBN1479",
    Results: [
        {
            ABS: "",
            ActiveSafetySysNote: "",
            AdaptiveCruiseControl: "",
            AdaptiveDrivingBeam: "",
            AdaptiveHeadlights: "",
            AdditionalErrorText: "",
            AirBagLocCurtain: "",
            AirBagLocFront: "",
            AirBagLocKnee: "",
            AirBagLocSeatCushion: "",
            AirBagLocSide: "",
            Artemis: "",
            AutoReverseSystem: "",
            AutomaticPedestrianAlertingSound: "",
            AxleConfiguration: "",
            Axles: "",
            BasePrice: "",
            BatteryA: "",
            BatteryA_to: "",
            BatteryCells: "",
            BatteryInfo: "",
            BatteryKWh: "",
            BatteryKWh_to: "",
            BatteryModules: "",
            BatteryPacks: "",
            BatteryType: "",
            BatteryV: "",
            BatteryV_to: "",
            BedLengthIN: "",
            BedType: "",
            BlindSpotMon: "",
            BodyCabType: "MDHD: Conventional",
            BodyClass: "Truck - Tractor",
            BrakeSystemDesc: "",
            BrakeSystemType: "Air & Hydraulic",
            BusFloorConfigType: "",
            BusLength: "",
            BusType: "",
            CAFEBodyType: "",
            CAFEMake: "",
            CAFEModel: "",
            CAN_AACN: "",
            CIB: "",
            CashForClunkers: "",
            ChargerLevel: "",
            ChargerPowerKW: "",
            CoolingType: "",
            Country: "",
            CurbWeightLB: "",
            CustomMotorcycleType: "",
            DaytimeRunningLight: "",
            DestinationMarket: "",
            DisplacementCC: "14800.0",
            DisplacementCI: "903.15141260203",
            DisplacementL: "14.8",
            Doors: "",
            DriveType: "6x4",
            DriverAssist: "",
            DynamicBrakeSupport: "",
            EDR: "",
            ESC: "",
            EVDriveUnit: "",
            ElectrificationLevel: "",
            EngineConfiguration: "In-Line",
            EngineCycles: "",
            EngineCylinders: "6",
            EngineHP: "",
            EngineHP_to: "",
            EngineKW: "",
            EngineManufacturer: "",
            EngineModel: "Detroit Diesel DD15",
            EntertainmentSystem: "",
            EquipmentType: "",
            ErrorCode:
                "0 - VIN decoded clean. Check Digit (9th position) is correct",
            ForwardCollisionWarning: "",
            FuelInjectionType: "",
            FuelTypePrimary: "Diesel",
            FuelTypeSecondary: "",
            GVWR: "Class 8: 33,001 lb and above (14,969 kg and above)",
            KeylessIgnition: "",
            LaneDepartureWarning: "",
            LaneKeepSystem: "",
            LowerBeamHeadlampLightSource: "",
            Make: "FREIGHTLINER",
            Manufacturer: "DAIMLER TRUCKS NORTH AMERICA LLC",
            ManufacturerId: "1024",
            ManufacturerType: "",
            Model: "Cascadia",
            ModelYear: "2012",
            MotorcycleChassisType: "",
            MotorcycleSuspensionType: "",
            NCAPBodyType: "",
            NCAPMake: "",
            NCAPModel: "",
            NCICCode: "",
            NCSABodyType: "",
            NCSAMake: "",
            NCSAModel: "",
            Note: '125" sleepercab',
            OtherBusInfo: "",
            OtherEngineInfo: "",
            OtherMotorcycleInfo: "",
            OtherRestraintSystemInfo: "",
            OtherTrailerInfo: "",
            ParkAssist: "",
            PedestrianAutomaticEmergencyBraking: "",
            PlantCity: "Saltillo",
            PlantCompanyName: "",
            PlantCountry: "Mexico",
            PlantState: "Coahuila",
            PossibleValues: "",
            Pretensioner: "",
            RearCrossTrafficAlert: "",
            RearVisibilitySystem: "",
            SAEAutomationLevel: "",
            SAEAutomationLevel_to: "",
            SeatBeltsAll: "",
            SeatRows: "",
            Seats: "",
            SemiautomaticHeadlampBeamSwitching: "",
            Series: "",
            Series2: "",
            SteeringLocation: "",
            SuggestedVIN: "",
            TPMS: "",
            TopSpeedMPH: "",
            TrackWidth: "",
            TractionControl: "",
            TrailerBodyType: "",
            TrailerLength: "",
            TrailerType: "",
            TransmissionSpeeds: "",
            TransmissionStyle: "",
            Trim: "",
            Trim2: "",
            Turbo: "",
            VIN: "1FUJGLDR9CSBN1479",
            ValveTrainDesign: "",
            VehicleType: "TRUCK ",
            WheelBaseLong: "",
            WheelBaseShort: "",
            WheelBaseType: "",
            WheelSizeFront: "",
            WheelSizeRear: "",
            Wheels: "",
            Windows: ""
        }
    ]
};
