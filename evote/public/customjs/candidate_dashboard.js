document.addEventListener('DOMContentLoaded', function() {
  // Ensure candidatesData is defined
  if (typeof candidatesData === 'undefined' || !Array.isArray(candidatesData)) {
      console.error("candidatesData is not defined or is not an array.");
      return;
  }

  const names = candidatesData.map(candidate => candidate.name);
  const votes = candidatesData.map(candidate => candidate.votes);

  // Get the canvas context
  const ctx = document.getElementById('voteChart').getContext('2d');
  if (!ctx) {
      console.error("Canvas with id 'voteChart' not found!");
      return;
  }

  // Create the bar chart
  const voteChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: names,
          datasets: [{
              label: 'Votes',
              data: votes,
              backgroundColor: 'rgba(54, 162, 235, 0.7)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true,
                  stepSize: 1
              }
          },
          plugins: {
              title: {
                  display: true,
                  text: positionTitle+' Votes Analysis'
              },
              legend: {
                  display: false
              }
          }
      }
  });
});
