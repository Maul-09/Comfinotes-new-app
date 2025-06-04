const canvas = document.getElementById('myChart');
const ctx = canvas.getContext('2d');

const chart = {
  top: 40,
  bottom: 40,
  left: 60,
  right: 30,
  width: canvas.width - 90,
  height: canvas.height - 80
};

function getLast6MonthsLabels() {
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  const now = new Date();
  let labels = [];

  for (let i = 5; i >= 0; i--) {
    const date = new Date(now.getFullYear(), now.getMonth() - i, 1);
    const month = months[date.getMonth()];
    const year = date.getFullYear();
    labels.push(`${month} ${year}`);
  }

  return labels;
}

const labels = getLast6MonthsLabels();
const income = [3000, 4200, 5000, 6200, 5800, 7000];
const expenses = [2500, 3900, 4700, 5000, 4500, 5200];
const maxVal = Math.max(...income, ...expenses) * 1.1;
const yStep = 1000;

function formatNumber(val) {
  if (val >= 1000) return (val / 1000).toFixed(0) + 'k';
  return val;
}

function drawAxes() {
  ctx.strokeStyle = '#000';
  ctx.lineWidth = 2;
  ctx.beginPath();
  ctx.moveTo(chart.left, chart.top);
  ctx.lineTo(chart.left, chart.top + chart.height);
  ctx.lineTo(chart.left + chart.width, chart.top + chart.height);
  ctx.stroke();
}

function drawLabels() {
  ctx.fillStyle = '#000';
  ctx.font = '12px outfit';

  for (let i = 0; i <= maxVal; i += yStep) {
    const y = chart.top + chart.height - (i / maxVal) * chart.height;
    ctx.fillText(formatNumber(i), chart.left - 40, y + 4);
  }

  const stepX = chart.width / (labels.length - 1);
  labels.forEach((label, i) => {
    if (i % 1 === 0 && i < 5) {
      const x = chart.left + i * stepX;
      ctx.fillText(label, x - 25, chart.top + chart.height + 20);
    }
  });
}

function toPoints(data, progress = 1) {
  return data.map((val, i) => {
    const x = chart.left + i * (chart.width / (labels.length - 1));
    const y = chart.top + chart.height - ((val * progress) / maxVal) * chart.height;
    return { x, y };
  });
}

function drawSmoothLine(points, color) {
  ctx.strokeStyle = color;
  ctx.lineWidth = 2;
  ctx.beginPath();
  ctx.moveTo(points[0].x, points[0].y);

  for (let i = 0; i < points.length - 1; i++) {
    const midX = (points[i].x + points[i + 1].x) / 2;
    const midY = (points[i].y + points[i + 1].y) / 2;
    ctx.quadraticCurveTo(points[i].x, points[i].y, midX, midY);
  }

  ctx.lineTo(points[points.length - 1].x, points[points.length - 1].y);
  ctx.stroke();

  points.forEach(pt => {
    ctx.beginPath();
    ctx.arc(pt.x, pt.y, 4, 0, Math.PI * 2);
    ctx.fillStyle = color;
    ctx.fill();
  });
}

let progress = 0;
function animateChart() {
  if (progress < 1) {
    progress += 0.02;
    requestAnimationFrame(animateChart);
  }

  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawAxes();
  drawLabels();
  const incomePts = toPoints(income, progress);
  const expensesPts = toPoints(expenses, progress);
  drawSmoothLine(incomePts, '#2563EB');
  drawSmoothLine(expensesPts, '#F64159');
}

animateChart();
