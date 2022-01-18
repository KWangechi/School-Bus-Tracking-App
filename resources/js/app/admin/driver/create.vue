<template>
<div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Age</label>
  <input type="number" class="form-control" id="age" placeholder="Enter your age...">
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Date regsitered</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter registration date...">
</div>

<div class="mb-3">
    <button type="button" class="btn btn-success">Finish registration</button>
</div>

</div>
</template>


<script>
export default {
    data(){
        return{

        }
    },
    methods:{

    },
    computed:{

    },
    mounted(){
        console.log('Module for creating a driver!!')
    }
}
</script>