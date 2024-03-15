<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin</h1>
        <p>Dashboard</p>
        <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
    </main>
    <AdminFooterComp />
</template>

<script>
import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'
import { Bar } from 'vue-chartjs'
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'DashboardView',
    components: { Bar, AdminNavComp, AdminFooterComp },
    data() {
        return {
            chartData: {
                labels: [],
                datasets: []
            },
            chartOptions: {
                responsive: true,
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        }
    },
    async created() {
        const response = await fetch('/api/visitors') // Replace with your actual API endpoint
        const data = await response.json()

        this.chartData = {
            labels: data.visitors.map((item) => item.date),
            datasets: [
                {
                    label: 'Visitors',
                    data: data.visitors.map((item) => item.count),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        }
    }
}
</script>
