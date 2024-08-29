function pieChart(values,id,color,title){

    const xValues = values;
    //sample values
    const yValues = [55, 49, 44, 24, 15,55, 49, 44, 24, 15,1,2];
    const barColors = color;

    new Chart(id, {
    type: "pie",
    data: {
        // labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        title: {
        display: true,
        text:title
        }
    }
    });
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
function graphChart(label,id,title,range){
    const xValues = label;

    new Chart(id, {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ 
          data: range,
          borderColor: "red",
          fill: false
        }]
      },
      options: {
        legend: {display: false},
        title: {
            display: true,
            text:title
            }
        
      }
    });
}
