$(document).ready(function () {
    $.ajax({
        url: "http://3.86.186.255/index.php",
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
                carName.push(data[i]["car name"]);
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
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: power
                    },
                    {
                        label: 'Weight (Lbs.)',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: power
                    },
                    {
                        label: 'Speed',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: speed
                    },
                    {
                        label: 'Acceleration',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: acceleration
                    },
                    {
                        label: 'Braking',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: braking
                    },
                    {
                        label: 'Cornering',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: cornering
                    },
                    {
                        label: 'Stability)',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.1)',
                        data: stability
                    }
                ]
            };
            var ctx = $("#myCanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    barPercentage: 0.1
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});