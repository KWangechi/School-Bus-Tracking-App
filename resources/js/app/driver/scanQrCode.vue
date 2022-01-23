<template>
<div>

</div>
    <div>This is the scan QR  Code page</div>
    <br>
    <div id="reader" width="600px"></div>
</template>

<script>
export default {
    data(){
        return{
            
        }
    },
    methods:{
        scanQrCode(){
            // console.log("This method shoud be called once a QR code has been scanned!!!")
            
        this.$store.commit('SCAN_QRCODE')
            

        },
    },
    computed:{ecc

    },
}
</script>