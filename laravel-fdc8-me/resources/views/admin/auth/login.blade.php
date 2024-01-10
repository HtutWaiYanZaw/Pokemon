<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
            widows: 100%;
        }

        body {
            background-image: url("{{ asset('storage/login.webp') }}");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input,
        button {
            border-radius: .6rem !important;
        }
    </style>
</head>

<body>

    <div class="mt-5">

        <div class="mb-3">
            <h4 class="text-center">Login</h4>
        </div>
        <div class="mb-3">
            <form action="{{ url('admin/login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="email">
                    @if ($errors->has('email'))
                        <p class="text-danger mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="password">
                    @if ($errors->has('password'))
                        <p class="text-danger mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-3 text-center">
                    <button class="btn btn-primary" type="submit">Enter</button>
                </div>
            </form>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('[name="email"]').focus();
        })
    </script>
</body>

</html>
