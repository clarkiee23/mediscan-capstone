<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="day-chart" style="height: 500px; width: 100%;"></div>
    <br>
    <div id="month-chart" style="height: 500px; width: 100%;"></div>
</body>

<script src="{{url('js/canvasjs.min.js')}}"></script>
<script>
    window.onload = function() {
        let users = JSON.parse(localStorage.getItem('users'));
        let department = JSON.parse(localStorage.getItem('department'));
        let transaction = JSON.parse(localStorage.getItem('transaction'));
        let userMap = {}

        for (let i = 0; i < users.length; i++) {
            if (!userMap[users[i].id]) {
                userMap[users[i].id] = users[i].department_id
            }
        }

        // rendering the graph for day start here
        let dayChartLabel = {
            '12 AM': 0,
            '01 AM': 0,
            '02 AM': 0,
            '03 AM': 0,
            '04 AM': 0,
            '05 AM': 0,
            '06 AM': 0,
            '07 AM': 0,
            '08 AM': 0,
            '09 AM': 0,
            '10 AM': 0,
            '11 AM': 0,
            '12 PM': 0,
            '01 PM': 0,
            '02 PM': 0,
            '03 PM': 0,
            '04 PM': 0,
            '05 PM': 0,
            '06 PM': 0,
            '07 PM': 0,
            '08 PM': 0,
            '09 PM': 0,
            '10 PM': 0,
            '11 PM': 0
        }


        for (let x = 0; x < transaction.length; x++) {
            console.log(transaction[x].stamp.split(':'))
            let dayId = transaction[x].stamp.split(':')[0] + ' ' + transaction[x].stamp.split(':')[3]
   
            if (dayId) {
                dayChartLabel[dayId] = dayChartLabel[dayId] + 1;
            }
        }

        console.log(dayChartLabel)

        let dayLabel = new CanvasJS.Chart("day-chart", {
            animationEnabled: true,
            title: {
                text: "Daily Report"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "- ##\"\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: dayChartLabel['12 AM'], label: '12 AM'},
                    {y: dayChartLabel['01 AM'], label: '01 AM'},
                    {y: dayChartLabel['02 AM'], label: '02 AM'},
                    {y: dayChartLabel['03 AM'], label: '03 AM'},
                    {y: dayChartLabel['04 AM'], label: '04 AM'},
                    {y: dayChartLabel['05 AM'], label: '05 AM'},
                    {y: dayChartLabel['06 AM'], label: '06 AM'},
                    {y: dayChartLabel['07 AM'], label: '07 AM'},
                    {y: dayChartLabel['08 AM'], label: '08 AM'},
                    {y: dayChartLabel['09 AM'], label: '09 AM'},
                    {y: dayChartLabel['10 AM'], label: '10 AM'},
                    {y: dayChartLabel['11 AM'], label: '11 AM'},
                    {y: dayChartLabel['12 PM'], label: '12 PM'},
                    {y: dayChartLabel['01 PM'], label: '01 PM'},
                    {y: dayChartLabel['02 PM'], label: '02 PM'},
                    {y: dayChartLabel['03 PM'], label: '03 PM'},
                    {y: dayChartLabel['04 PM'], label: '04 PM'},
                    {y: dayChartLabel['05 PM'], label: '05 PM'},
                    {y: dayChartLabel['06 PM'], label: '06 PM'},
                    {y: dayChartLabel['07 PM'], label: '07 PM'},
                    {y: dayChartLabel['08 PM'], label: '08 PM'},
                    {y: dayChartLabel['09 PM'], label: '09 PM'},
                    {y: dayChartLabel['10 PM'], label: '10 PM'},
                    {y: dayChartLabel['11 PM'], label: '11 PM'}
                ]
            }]
        });
        
        dayLabel.render();
        // rendering the graph for day end here

        // rendering the graph for month start here
        let monthChartLabel = {
            1: 0,
            2: 0,
            3: 0
        }

        for (let x = 0; x < transaction.length; x++) {
            let dept_id = userMap[transaction[x].id_number];
            
            if (dept_id) {
                monthChartLabel[dept_id] = monthChartLabel[dept_id] + 1;
            }
        }

        let month_chart = new CanvasJS.Chart("month-chart", {
            animationEnabled: true,
            title: {
                text: "Monthly Report"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: monthChartLabel[1], label: "Elementary"},
                    {y: monthChartLabel[2], label: "Senior High School"},
                    {y: monthChartLabel[3], label: "College"}
                ]
            }]
        });
        
        month_chart.render();
        // rendering the graph for month end here

    }
</script>
</html>