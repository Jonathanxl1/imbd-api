<template>
	<div class="container" >
		<h1 class="text text-center">Result Search: {{value}} </h1>
		<div class="row ">
			<div class="col-4 mx-auto">
				<h2 class="h2 text-center">Series:</h2>
				<ul class="list-group  border-success border-top-0" v-if="result.series.length > 0" >
					<li class="list-group-item"  v-for="(serie,Ind) in result.series" :key="serie.Ind">
						<router-link class="text-success" :to="{name:'series/',params:{id:serie.serie_id}}">			
							{{serie.title}}
						</router-link>
					
					</li>
				
				</ul>
					<span class="list-group-item border border-danger" v-else >Not Found</span>
			</div>
			<div class="col-4 mx-auto">
			<h2 class="h2 text-center">Movies:</h2>
				<ul class="list-group  border-success border-top-0" v-if="result.movies.length > 0" >
					<li class="list-group-item "  v-for="(movie,Ind) in result.movies" :key="movie.Ind">
						<router-link class="text-success" :to="{name:'movies/',params:{id:movie.movie_id}}">	
							{{movie.title}}
						</router-link>

					</li>
				</ul>
					<span class="list-group-item border border-danger" v-else >Not Found</span>
			</div>
		</div>		
	</div>
</template>

<script>
export default {

  name: 'Search',

  data () {
    return {
    	result:{
    		type:Object,
    		series:[],
    		movies:[]
    	},
    	key:this.$route.params.key,
    	value:this.$route.params.value

    }
  },
  created(){
  	this.res()
  },
  watch:{
	'$route.params': function () {
		this.key=this.$route.params.key
    	this.value=this.$route.params.value
    	this.res()
        	},

  },
  methods:{
  	 getHost(){
      return location.host;
    },
    res(){

      fetch('http://'+this.getHost()+'/v.1/api/series/'+this.key.toLowerCase()+'='+this.value,{method:'GET'})
        .then(response =>{
        	if(response.status != 200){
        		this.$set(this.result,'series',[])
        		return;
        	}
        	response.json().then((data)=>{
        		  this.$set(this.result,'series',data)
        		console.log(data)
        	})
        }).catch(error=>{
        	console.log(error)
        });

        fetch('http://'+this.getHost()+'/v.1/api/movies/'+this.key.toLowerCase()+'='+this.value,{method:'GET'})
        .then(response =>{
        	if(response.status != 200){
        		this.$set(this.result,'movies',[])
        				return;
        	}
        	response.json().then((data)=>{
        		  this.$set(this.result,'movies',data)
        		        	})
        }).catch(error=>{
        	console.log(error)
        });
			
         


    }
  }
}
</script>

<style lang="css" scoped>
</style>