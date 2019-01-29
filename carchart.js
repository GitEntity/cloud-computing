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
                labels: power,
                datasets: [
                    {
                        labels: 'Power (HP)',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(200, 200, 200, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(200, 200, 200, 1)'
                        ],
                        borderWidth: 1
                    }]
                    }
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