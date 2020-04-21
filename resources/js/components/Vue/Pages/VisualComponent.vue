<template>
	<div class="container">
    <div class="row">
      <div class="col">
        <h1 class="h1 text-center">{{media.title}}</h1>
      </div>
       
    </div>
		  <div class="row">
        <div class="col-12">
        <img :src="img" class="rounded mx-auto d-block" width="1024" alt=""/>
      </div>
    </div>
    
    <div class="col-lg-5 card mx-auto mt-3">
      <div class="card-body ">
        <h3 class=" mt-3 card-subtitle"><span >Release: </span>{{media.release}}</h3>
        <h3 class=" mt-3 card-subtitle"><span>Category:</span>{{media.category}}</h3>
        <h3 class=" mt-3 card-subtitle"><span>Rating:</span>{{media.rating}}</h3>
        <h3 class=" mt-3 card-subtitle"><span>Actors:</span>{{media.actors[0].name}}</h3>
        <h3 class=" mt-3 card-subtitle"><span>Directors:</span>{{media.directors[0].name}}</h3>
      </div>
      <div class="row mx-auto mb-3">
        <router-link :to="$route.path+'/edit/'" class="btn btn-success btn-md col" >Edit</router-link>
        <button class="btn btn-danger btn-md col ml-lg-2" v-on:click="del" >Delete</button>
      </div>
      
      
    </div>
		
	</div>
</template>

<script>
export default {

  name: 'VisualComponent',

  data () {
    return {
      img:'https://picsum.photos/1280/768',
    	url:this.$route.path,
	media:{
		type:Array,
		}
    }
  },
  created(){
  	  fetch('http://'+this.getHost()+'/v.1/api'+this.url,{
  		method:'GET',
  	}).then(response => response.json())
  	.then(data => this.media = data)
  },
  methods:{
    del(){
      fetch('http://'+this.getHost()+'/v.1/api'+this.url,{method:'DELETE'})
      .then(response => response.status)
      .then(()=>{location.replace(this.url)})
      .catch(()=>{console.log('Failed Delete Resource')})
    },
    getHost(){
      return location.host
    }

  }
}
</script>

