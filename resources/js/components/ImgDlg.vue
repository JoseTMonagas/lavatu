<template>
    <v-dialog v-model="dialog" width="500">
        <template v-slot:activator="{ on }">
            <v-btn :color="btnColor" dark v-on="on">
                {{ btnLabel }}
            </v-btn>
        </template>

        <v-card>
            <v-img :src="imgSrc"></v-img>
        </v-card>
    </v-dialog>
</template>
<script>
export default {
    props: {
        btnColor: {
            type: String,
            required: true,
        },
        btnLabel: {
            type: String,
            required: true,
        },
        imgSrc: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            dialog: false
        }
    }
};
</script>
