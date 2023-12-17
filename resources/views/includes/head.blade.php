<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Staane Dashbaord">
<meta name="keywords" content="admin,dashboard">
<meta name="author" content="stacks">

<title>Donation Manager</title>

<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">

<link href="{{ asset('assets/css/connect.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/admin3.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/dark_theme.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
        .chart-container {
            position: relative;
            width: 200px;
            height: 200px;
        }

        .chart {
            position: absolute;
            width: 100%;
            height: 100%;
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
            background-color: #f4f4f4;
        }

        .segment {
            position: absolute;
            width: 100%;
            height: 100%;
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        }

        .circle {
            position: absolute;
            width: 100%;
            height: 100%;
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
</style>
