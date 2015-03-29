var width = window.innerWidth;
var height = window.innerHeight;

//set the antialias to true, because we want the edges of objects to be smooth, not jagged
var renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(width, height);

//add the renderer's canvas element to the document (you can also do this using a library, like jQuery: $('body').append(renderer.domElement)).
document.body.appendChild(renderer.domElement);

var scene = new THREE.Scene;

//SCENE OBJECTS

var cubeGeometry = new THREE.BoxGeometry(100, 100, 100);
var cubeMaterial = new THREE.MeshLambertMaterial({ color: 0xffffff });
var cube = new THREE.Mesh(cubeGeometry, cubeMaterial);

cube.rotation.y = Math.PI * 45 / 180;

scene.add(cube);

//skybox
var urls = ['images/pos-x.png',
  'images/neg-x.png',
  'images/pos-y.png',
  'images/neg-y.png',
  'images/pos-z.png',
  'images/neg-z.png'
];

var cubemap = new THREE.ImageUtils.loadTextureCube(urls); // load all textures
cubemap.format = THREE.RGBFormat;

var shader = THREE.ShaderLib['cube']; //init cube shader from built-in lib
shader.uniforms['tCube'].value = cubemap; // apply textures to shader

//create shader material
var skyBoxMaterial = new THREE.ShaderMaterial( {
  fragmentShader: shader.fragmentShader,
  vertexShader: shader.vertexShader,
  uniforms: shader.uniforms,
  depthWrite: false,
  side: THREE.BackSide
});

// create skybox mesh
var skybox = new THREE.Mesh(
  new THREE.BoxGeometry(10000, 10000, 10000),
  skyBoxMaterial
);

skybox.rotation.y = 180;
scene.add(skybox);


var pointLight = new THREE.PointLight(0xffffff);
pointLight.position.set(0, 300, 200);

scene.add(pointLight);

//camera
var camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 10000);
// camera.position.y = 160;
// camera.position.z = 1000;
// camera.position.x = 0;

//camera.lookAt(cube.position);

scene.add(camera);

function render() {

    var timer = Date.now() * 0.0001;

    camera.position.x = Math.cos( timer ) * 200;
    camera.position.z = Math.sin( timer ) * 200;
    camera.lookAt( scene.position );

    renderer.render( scene, camera );
    requestAnimationFrame(render);
}

render();


