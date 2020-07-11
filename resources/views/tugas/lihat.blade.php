<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>
                {{ $tugas->nama_tugas }}
            </td>
        </tr>
        <tr>
            <td>
                <script>
                    CountDownTimer('{{$tugas->created_at}}', 'countdown');
                    function CountDownTimer(dt, id)
                    {
                        var end = new Date('{{$tugas->end_date}}');
                        var _second = 1000;
                        var _minute = _second * 60;
                        var _hour = _minute * 60;
                        var _day = _hour * 24;
                        var timer;
                        function showRemaining() {
                            var now = new Date();
                            var distance = end - now;
                            if (distance < 0) {
    
                                clearInterval(timer);
                                document.getElementById(id).innerHTML = '<b>Pesanan Sudah Bayar</b>';
                                return;
                            }
                            var days = Math.floor(distance / _day);
                            var hours = Math.floor((distance % _day) / _hour);
                            var minutes = Math.floor((distance % _hour) / _minute);
                            var seconds = Math.floor((distance % _minute) / _second);
    
                            document.getElementById(id).innerHTML ='<small><b>Segera bayar sebelum : </b></small><br>';
                            document.getElementById(id).innerHTML += days + '<small> Hari </small>';
                            document.getElementById(id).innerHTML += hours + '<small> Jam </small>';
                            document.getElementById(id).innerHTML += minutes + '<small> Menit </small>';
                            document.getElementById(id).innerHTML += seconds + '<small> Detik </small>';
                        }
                        timer = setInterval(showRemaining, 1000);
                    }
                </script>
                <div id="countdown" style="color: red">
                </td>
            </tr>
        </table>
</body>
</html>