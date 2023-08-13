@php

// Get all vars available
$all_vars = get_defined_vars();

// Filter out unwanted entries
foreach ($all_vars as $key => $value) {
    if (preg_match('/app/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/obLevel/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/site_name/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/__blade/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/__data/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/__env/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/__path/', $key)) {
        unset($all_vars[$key]);
    }
    if (preg_match('/__store/', $key)) {
        unset($all_vars[$key]);
    }
}

$all_vars_encoded = json_encode($all_vars, JSON_HEX_TAG);
// ray($all_vars);

// Convert out PHP object to JSON
// $js_code = 'console.log("WordPress debugger:",' . $all_vars_encoded . ');';
@endphp

<script>
  // This function clears the proto from the JS console log
  // The proto has no significance to our PHP vars
  console.debug = function() {
    function clear(o) {

      var obj = JSON.parse(JSON.stringify(o));
      // [!] clone

      if (obj && typeof obj === 'object') {
        obj.__proto__ = null;
        // clear

        for (var j in obj) {
          obj[j] = clear(obj[j]); // recursive
        }
      }
      return obj;
    }
    for (var i = 0, args = Array.prototype.slice.call(arguments, 0); i < args.length; i++) {
      args[i] = clear(args[i]);
    }
    console.log.apply(console, args);
  };

  // Call our custom debugger
  // console.group('%c⚡️ Kota debugger', 'color: #fff; font-size: 12px; background: linear-gradient(#e66465, #9198e5); padding: 1px 5px; border-radius: 3px;');
  // console.debug({!! $all_vars_encoded !!})
  console.log('%c⚡️ MK debugger',
    'color: #fff; font-size: 12px; background: linear-gradient(#e66465, #9198e5); padding: 1px 5px; border-radius: 3px;'
  );
  Object.entries({!! $all_vars_encoded !!}).forEach(keyValuePair => {
    console.debug(...keyValuePair)
  })
  console.log('');
  // console.groupEnd();
</script>
