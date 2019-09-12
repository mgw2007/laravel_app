<?php $k = 'Y'; ?>
<?php $checked = old($name, $checked); ?>
<div class="customeRadioIcon">
    <label class="icons-radio-input icons-radio-input--no-touch {{ $checked == $k ? 'icons-radio-input--checked':'' }} " for="{{$name}}_{{$k}}">
        <div class="icons-radio-input__icon">
            <i class="fa fa-check-circle"></i>
        </div>
        <input id="{{$name}}_{{$k}}" type="radio" name="{{$name}}" class="icons-radio-input__input" value="{{$k}}" {{ $checked == $k ? 'checked':'' }}>
        <div class="icons-radio-input__label icons-radio-input__label--top-separation">{{$values[$k]}}</div>
    </label>

    <?php $k = 'N'; ?>

    <label class="icons-radio-input icons-radio-input--no-touch {{ $checked == $k ? 'icons-radio-input--checked':'' }} " for="{{$name}}_{{$k}}">
        <div class="icons-radio-input__icon">
            <i class="fa fa-times-circle"></i>
        </div>
        <input id="{{$name}}_{{$k}}" type="radio" name="{{$name}}" class="icons-radio-input__input" value="{{$k}}" {{ $checked == $k ? 'checked':'' }}>
        <div class="icons-radio-input__label icons-radio-input__label--top-separation">{{$values[$k]}}</div>
    </label>
</div>
<script>
    setTimeout(function() {
        $('.icons-radio-input').click(function() {
            $(this).parents('.customeRadioIcon').find('.icons-radio-input--checked').removeClass("icons-radio-input--checked")
            $(this).addClass('icons-radio-input--checked')
        })
    })
</script>