<template>
    <div>
        <h1 class="h1"> TABLE </h1>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
                <td>50</td>
            </tr>
        </table>


    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'TableApp',
    setup() {
        let data = ref([]);

        return { data };
    }
}
</script>

<style scoped>
.h1 {
    background-color: #f44336;
    padding: 30px 40px;
    color: white;
    text-align: center;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th,
td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>