<template>

	<div class="card" >
      <h3 class="h3 text-center">{{header}}</h3>
			  <img :src="url" class="card-img-top" :alt="name">
			  <div class="card-body">
			    <h5 class="card-title">{{title}}</h5>
			    <div class="row">
            <div class="col">
              <router-link :to="link" class="btn btn-outline-success ">See more</router-link>
            </div>
          </div>
			    
			  </div>
	</div>
</template>

<script>
export default {

  name: 'CardComponent',
  props:['link','header'],

  data () {
    return {
    	url:'https://picsum.photos/1280/768',
    	title:'',
      name:''
       }
  },
}
</script>

