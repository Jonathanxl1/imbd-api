<template>
	<div class="col-lg-5 mx-auto">
		<h3 class="h3">Top 5 List {{name}}'s</h3>
		<table class="table">
  <thead>
    <tr>
      <th scope="col">Pos</th>
      <th scope="col">Title</th>
      
    </tr>
  </thead>
  <tbody >
  	<tr v-if="isLoading" >
  		<td colspan="2" >Loading..</td>
  	</tr>
    <tr 
    v-for="(n,index) in data" 
    :key="index"
	v-if="index < 5 && !isLoading"
    >
      <th scope="row">{{index + 1}}</th>
      <td>
		<router-link class="text-success" :to="name.toLowerCase()+'s/'+`${n.movie_id || n.serie_id}`">
      	{{n.title}}
		</router-link>
  </td>
     </tr>
    
  </tbody>
</table>
	</div>
</template>

<script>

export default {

  name: 'TopList',
  props:['name','data'],

  data () {
    return {
    	info:this.data,
    	 }

  },
  created(){
  	this.isLoading=true;
  },
  mounted(){
  	this.isLoading=false;
  }
 
}
</script>

