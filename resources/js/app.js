import "./bootstrap";
import "flowbite";

import Chart from "chart.js/auto";
window.Chart = Chart;

import annotationPlugin from "chartjs-plugin-annotation";
Chart.register(annotationPlugin);

console.log("Chart loaded:", Chart);

import Swal from 'sweetalert2';
window.Swal = Swal;