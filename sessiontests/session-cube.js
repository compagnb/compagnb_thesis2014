
// new scene -- where we are placing everything
var scene = new THREE.Scene();
//new perspective camera
//(angle - field of view, aspect ratio, closest object-near clipping plane, furthest object - far clipping plane)
var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
//and a renderer
var renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight);
//attach renderer to html element
document.body.appendChild( renderer.domElement );

// scene objects

//define object and material
var geometry = new THREE.BoxGeometry(1, 1, 1);
var material = new THREE.MeshBasicMaterial( { color: 0x0c53a7});
//attach material to mesh
var cube = new THREE.Mesh( geometry, material );
//add object to scene
scene.add( cube );

//change camera position
camera.position.z = 5;

//render function - loop draws 60x per second
function render() {
    requestAnimationFrame( render );
    //to add animation to the cube
    cube.rotation.x += 0.1;
    cube.rotation.y += 0.1;
    renderer.render( scene, camera );
}
render();
