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
                //carName.push(data[i]);
                power.push(data[i].power);
                weight.push(data[i].weight);
                speed.push(data[i].speed);
                acceleration.push(data[i].acceleration);
                braking.push(data[i].braking);
                cornering.push(data[i].cornering);
                stability.push(data[i].stability);
            }

            var chartdata = {
                labels: carName,
                datasets: [
                    {
                        label: 'Power (HP)',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 0.75)',
                        data: power
                    }
                ]
            };
            var ctx = $("#myCanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});