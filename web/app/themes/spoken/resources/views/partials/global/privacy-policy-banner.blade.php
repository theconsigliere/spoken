@if ($privacyPolicy)

<div class="js-privacy-policy privacyPolicy" data-duration="{{ $privacyPolicy['cookie_policy_range'] }}">
   
    <div class="privacyPolicy__text-group">
       <p> {!! $privacyPolicy['cookie_policy_notice'] !!}</p>
    </div>

    <div class="privacyPolicy__button">
        <button class="btn js-button"><?php echo esc_html('Ok!'); ?></button>
    </div>

</div>


@endif



