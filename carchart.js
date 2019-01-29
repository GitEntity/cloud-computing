$(document).ready(function () {
    $("#yourGarage").click(function(){
        var main = $('#main_table').find('input[type="checkbox"]:checked').closest("tr");
        console.log(main);
    })

    $.ajax({
        url: "http://3.86.186.255/cloud-computing/allCars.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var carName = [];
            var power = [];
            var weight = [];
            var speed = [];
            var acceleration = [];
            var braking = [];
            var cornering = [];
            var stability = [];

            for (var i in data){
                carName.push(data[i]["car_name"]);
                power.push(data[i].power);
                weight.push(data[i].weight);
                speed.push(data[i].speed);
                acceleration.push(data[i].acceleration);
                braking.push(data[i].braking);
                cornering.push(data[i].cornering);
                stability.push(data[i].stability);
            }

            var chartdata = {
                labels: [power, weight, speed, acceleration, braking, cornering, stability],
                datasets: [
                    {
                        label: 'Power (HP)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: power
                    },
                    {
                        label: 'Weight (Lbs.)',
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgb(255, 159, 64)',
                        data: power
                    },
                    {
                        label: 'Speed',
                        backgroundColor: 'rgba(255, 205, 86, 0.2)',
                        borderColor: 'rgb(255, 205, 86)',
                        data: speed
                    },
                    {
                        label: 'Acceleration',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgb(75, 192, 192)',
                        data: acceleration
                    },
                    {
                        label: 'Braking',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: braking
                    },
                    {
                        label: 'Cornering',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgb(153, 102, 255)',
                        data: cornering
                    },
                    {
                        label: 'Stability)',
                        backgroundColor: 'rgba(201, 203, 207, 0.2)',
                        borderColor: 'rgb(201, 203, 207)',
                        data: stability
                    }
                ]
            };
            var ctx = $("#myCanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    barPercentage: 0.1,
                    beginAtZero: true
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});