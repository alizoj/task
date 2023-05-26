<template>
    <div>
        <table>
            <thead>
            <tr>
                <th>Course Name</th>
                <th>User Name</th>
                <th @click="sortBy('status')">Status</th>
                <th>Date of Joining Course</th>
                <th>Date of Course Completion</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="enrollment in enrollments" :key="enrollment.id">
                <td>{{ enrollment.course.title }}</td>
                <td>{{ enrollment.user.name }}</td>
                <td>{{ enrollment.status }}</td>
                <td>{{ enrollment.created_at }}</td>
                <td>{{ enrollment.completed_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--    <button @click="fetchEnrollments()">GET</button>-->
</template>

<script>
export default {
    data() {
        return {
            enrollments: [],
            sort: 'completion_date',
            order: 'asc',
        };
    },
    mounted() {
        this.fetchEnrollments();
    },
    methods: {
        fetchEnrollments() {
            axios.get('/enrollments', {
                params: {
                    sort: this.sort,
                    order: this.order,
                },
            })
                .then(response => {
                    this.enrollments = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        sortBy(field) {
            if (field === this.sort) {
                this.order = this.order === 'asc' ? 'desc' : 'asc';
            } else {
                this.sort = field;
                this.order = 'asc';
            }
            this.fetchEnrollments();
        },
    },
};
</script>
