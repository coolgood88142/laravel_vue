<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.isHide{
  display:none;
}
</style>
<body>
    <div class="container">
        <div id="app" class="justify-content-center align-items-center">
          @foreach ($items as $key => $item)
            <label>
              <input type="radio" name="feed1[]" data-item="{{ $item }}" value="{{ $key }}">
              {{ $item }}
            </label>
          @endforeach
          <p>--------------------------------</p>

          @foreach ($feedItems as $key => $feed)
            <label>
              <input type="radio" name="feed2[]" value="{{ $key }}">
              {{ $feed }}
            </label>
          @endforeach

          <input type="hidden" id="data" value="{{ json_encode($data) }}">
        </div>
    </div>
</body>
<script src="{{mix('js/app.js')}}"></script>
<script>
  let defaultRadio = '食物';
  let data = JSON.parse($('#data').val());
  $("input[name='feed1[]']").on('click', function(){
    let feed = data[this.value];
    $("input[name='feed2[]']").each(function(index, el){
        console.log(jQuery.type($(el).val()));
        if(feed.includes(parseInt($(el).val()))){
          $(this).parent().show();
        }else{
          $(this).parent().hide();
        }
    });
  })

  // $("input[name='feed1[]']")[0].click();
  let feed1 = $("input[name='feed1[]']");
  $(feed1).each(function(index, items){
    if(defaultRadio == $(items).data('item')){
      $(this).click();
    }
  });

  let feed2 = $("input[name='feed2[]']")[0];
  $(feed2).append("<input type='text' value='1'>")

</script>
</html>