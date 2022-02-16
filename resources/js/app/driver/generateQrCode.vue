<template>
    <div>
        <div class="text-center">
            <!-- <p>Generate a QR Code Page!!</p> -->
            <button
                type="button"
                class="btn btn-primary"
                @click="generateQrCode"
            >
                Generate a QR Code
            </button>
            <br />
            <br />
            <br />
            <!-- //Display the QR Code -->
            <div id="qrcode">
                <!-- {!! QrCode::size(500) ->format('svg') ->generate( 'Rachel Karanja', ) !} -->
                 <qrcode value="Rachel_Karanja" :options="{ color: { dark: '#000000' } }"></qrcode>
            </div>
        </div>
    </div>
</template>

<script>
import Qrcode from '@chenfengyuan/vue-qrcode';
export default {
    components:{
        Qrcode
    },
    data() {
        return {
            qrCode: null,
            options: ""
        };
    },
    methods: {
        async generateQrCode() {
            let code = document.getElementById("qrcode");

            await axios
                .post("/api/driver/createCode")
                .then((response) => {
                    console.log(response);

                    // code = response.data.data
                    code.innerText = response.data.data;

                    // document.write(code);
                })
                .catch((err) => {
                    console.log(err);
                });

            console.log(code);
        },
    },
    computed: {},
};
</script>
