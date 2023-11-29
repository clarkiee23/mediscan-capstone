@extends('layout.admin-patientR-master')

@section('title')
    Reports
@stop

@section('content')
<style>
   .grid-container {
        display: grid;
        grid-template-columns: auto auto;
    }
    .grid-item {
        /* text-align: center; */
        padding: 20px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- HEADING -->
<div class="main-container">
    <div class="grid-container">
        <div class="grid-item">
            <h1>Census Reports</h1>
        </div>
        <div class="grid-item" style="text-align: right">
            <button type="button" class="btn btn-primary" onclick="openSarj()">Print</button>
        </div>  
    </div>
</div>

<!-- GRAPHS CONTENT -->
<div class="main-container">
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <!-- <div class="grid-container">
        <div class="grid-item">
            <div id="day-chart" style="height: 500px; width: 100%;"></div>
        </div>
        <div class="grid-item">
            <div id="month-chart" style="height: 500px; width: 100%;"></div>
        </div>  
    </div> -->
</div>

<script src="{{url('js/canvasjs.min.js')}}"></script>
<script>
    function openSarj() {
        window.open(location.origin + '/download')
    }

    window.onload = function() {
        let users = <?php echo $users?>;
        let department = <?php echo $department ?>;
        let transaction = <?php echo $transaction ?>;
        let userMap = {}

        for (let i = 0; i < users.length; i++) {
            if (!userMap[users[i].id]) {
                userMap[users[i].id] = users[i].department_id
            }
        }

        localStorage.setItem('users', JSON.stringify(users));
        localStorage.setItem('department', JSON.stringify(department));
        localStorage.setItem('transaction', JSON.stringify(transaction));

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
        }


        for (let x = 0; x < transaction.length; x++) {
            let dayId = transaction[x].stamp.split(':')[0] + ' ' + transaction[x].stamp.split(':')[3]
   
            if (dayId) {
                dayChartLabel[dayId] = dayChartLabel[dayId] + 1;
            }
        }

        for (let key in dayChartLabel) {
            dayChartLabel[key] = (dayChartLabel[key] / 31)
        }

        // console.log(dayChartLabel)

        let dayLabel = new CanvasJS.Chart("day-chart", {
            animationEnabled: true,
            title: {
                text: "Daily Report"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "- ##0\"\"",
                indexLabel: "{label} {y}",
                dataPoints: [
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
                ]
            }]
        });
        
        //dayLabel.render();
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
        
        //month_chart.render();
        // rendering the graph for month end here

        // bar graph start here
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
                    { y: monthObj[monthNow]['Mon'], label: 'Mon'},
                    { y: monthObj[monthNow]['Tue'], label: 'Tue'},
                    { y: monthObj[monthNow]['Wed'], label: 'Wed'},
                    { y: monthObj[monthNow]['Thu'], label: 'Thu'},
                    { y: monthObj[monthNow]['Fri'], label: 'Fri'},
                    { y: monthObj[monthNow]['Sat'], label: 'Sat'},
                    { y: monthObj[monthNow]['Sun'], label: 'Sun'}
                ]
            }]
        });
        chart.render();
        

    }
</script>

@stop
