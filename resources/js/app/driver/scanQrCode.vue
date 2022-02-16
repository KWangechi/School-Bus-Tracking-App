<template>
    <div></div>
    <div>This is the scan QR Code page</div>
    <br />

    <button type="button" class="btn btn-primary" @click="scanQrCode">
        Start Scanning
    </button>
    <div id="reader" width="600px"></div>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        scanQrCode() {
            this.$store.commit("SCAN_QRCODE");
        },
    },
    computed: {},
};
</script>
