<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>

<script src="{{url('js/canvasjs.min.js')}}"></script>
<script>
    window.onload = function() {
        let users = JSON.parse(localStorage.getItem('users'));
        let department = JSON.parse(localStorage.getItem('department'));
        let transaction = JSON.parse(localStorage.getItem('transaction'));

        let monthObj = {
            Jan: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Feb: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Mar: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Apr: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            May: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Jun: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Jul: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Aug: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Sep: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Oct: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Nov: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            },
            Dec: {
                Mon: 0,
                Tue: 0,
                Wed: 0,
                Thu: 0,
                Fri: 0,
                Sat: 0,
                Sun: 0
            }
            
        }

        for (y = 0; y < transaction.length; y++) {
            if(transaction[y] && transaction[y].info) {
                let day = transaction[y].info.split(' ')[0]
                let month = transaction[y].info.split(' ')[1]
                if (monthObj[month]) {
                    monthObj[month][day] = monthObj[month][day] + 1
                }
                
            }
        }

        let dateNow = new Date().toString()
        let monthNow = dateNow.split(' ')[1]
        let title = "Monthly Report" + ' - ' + monthNow

        let chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: title
            },
            axisY: {
                title: "Transaction"
            },
            data: [{        
                type: "column",  
                showInLegend: false, 
                legendMarkerColor: "grey",
                legendText: "Transactions",
                dataPoints: [      
                    { y: monthObj[monthNow]['Mon'], label: 'Mon' + ' - ' + monthObj[monthNow]['Mon'].toString()},
                    { y: monthObj[monthNow]['Tue'], label: 'Tue' + ' - ' + monthObj[monthNow]['Tue'].toString()},
                    { y: monthObj[monthNow]['Wed'], label: 'Wed' + ' - ' + monthObj[monthNow]['Wed'].toString()},
                    { y: monthObj[monthNow]['Thu'], label: 'Thu' + ' - ' + monthObj[monthNow]['Thu'].toString()},
                    { y: monthObj[monthNow]['Fri'], label: 'Fri' + ' - ' + monthObj[monthNow]['Fri'].toString()},
                    { y: monthObj[monthNow]['Sat'], label: 'Sat' + ' - ' + monthObj[monthNow]['Sat'].toString()},
                    { y: monthObj[monthNow]['Sun'], label: 'Sun' + ' - ' + monthObj[monthNow]['Sun'].toString()}
                ]
            }]
        });
        chart.render();

    }
</script>
</html>