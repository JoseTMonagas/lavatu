<template>
    <div></div>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    props: {
        text: {
            type: String,
            default: ''
        },
        icon: {
            type: String,
            default: 'success'
        },
        title: {
            type: String,
            default: ''
        },
        actionRoute: {
            type: String,
            default: ''
        }
    },
    created() {
        const icon = this.icon
        const text = this.text
        const title = this.title
        const timer = 3000
        const timerProgressBar = true
        const onClose = () => {}
        if (this.actionRoute != '') {
            const onClose = () => {
                window.location = this.actionRoute
            }
        }
        Swal.fire({ icon, text, title, timer, timerProgressBar, onClose })
    }
}
</script>
