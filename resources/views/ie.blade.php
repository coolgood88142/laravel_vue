<html>
    <body>
        <ul>
            <li class="docking-certifiable">
                <button class="btn btn--block btn--course" id="submitCertificate">
                    <span class="icon icon--certify"></span>
                    <div class="text">
                        可領證
                    </div>
                </button>
                <form id="getCertificate" action="{{ route('save') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </body>
    <script src="{{mix('js/app.js')}}"></script>
    <script>
        $('body').on('click', '#submitCertificate', _.debounce(function () {
            //$(this).append('@csrf')
            $(this).prop('disabled', true);
            $("#getCertificate").submit();
        }, 500));
    </script>
</html>