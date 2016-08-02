<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="css/owl.css"><!-- owl_login -->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js" type="text/javascript"></script><!-- owl_login -->
    <script src="js/resize.js" type="text/javascript"></script><!-- owl_login -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56980351-1', 'auto');
        ga('send', 'pageview');
    </script><!-- owl_login -->
</head>
<body>
<div class="loading-box">
    <div class="loading-location">
        <img src="svg/puff.svg" width="100" alt="">
    </div>
    <script>
        var winHeight;
        winHeight =$(window).height();
        $(".loading-box").css("height",winHeight);
    </script>
</div>

<div class="owl-container">
    <div id="login">
        <div class="wrapper">
            <div class="login">
                <form action="back/login.php" method="post" class="container offset1 loginform">
                    <div id="owl-login">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <div class="pad">
                        <input type="hidden" name="" value="">
                        <div class="control-group">
                            <div class="controls">
                                <label for="username" class="control-label fa fa-user"></label>
                                <input id="username" type="text" name="username" placeholder="Username" tabindex="1" autofocus="autofocus" class="form-control input-medium">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="password" class="control-label fa fa-asterisk"></label>
                                <input id="password" type="password" name="password" placeholder="Password" tabindex="2" class="form-control input-medium">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" tabindex="4" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script>
            $(function() {

                $('#login #password').focus(function() {
                    $('#owl-login').addClass('password');
                }).blur(function() {
                    $('#owl-login').removeClass('password');
                });
            });
        </script>
    </div>

</div>

<script type="text/javascript" src="js/ThreeWebGL.js"></script><!-- owl_login -->
<script type="text/javascript" src="js/ThreeExtras.js"></script><!-- owl_login -->
<script type="text/javascript" src="js/Detector.js"></script><!-- owl_login -->
<script type="text/javascript" src="js/RequestAnimationFrame.js"></script><!-- owl_login -->
<script id="vs" type="x-shader/x-vertex">

			varying vec2 vUv;

			void main() {

				vUv = uv;
				gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );

			}

		</script><!-- owl_login -->
<script id="fs" type="x-shader/x-fragment">

			uniform sampler2D map;

			uniform vec3 fogColor;
			uniform float fogNear;
			uniform float fogFar;

			varying vec2 vUv;

			void main() {

				float depth = gl_FragCoord.z / gl_FragCoord.w;
				float fogFactor = smoothstep( fogNear, fogFar, depth );

				gl_FragColor = texture2D( map, vUv );
				gl_FragColor.w *= pow( gl_FragCoord.z, 20.0 );
				gl_FragColor = mix( gl_FragColor, vec4( fogColor, gl_FragColor.w ), fogFactor );

			}

		</script><!-- owl_login -->
<script type="text/javascript">

    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

    // Bg gradient

    var canvas = document.createElement( 'canvas' );
    canvas.width = 32;
    canvas.height = window.innerHeight;

    var context = canvas.getContext( '2d' );

    var gradient = context.createLinearGradient( 0, 0, 0, canvas.height );
    gradient.addColorStop(0, "#1e4877");
    gradient.addColorStop(0.5, "#4584b4");

    context.fillStyle = gradient;
    context.fillRect(0, 0, canvas.width, canvas.height);

    document.body.style.background = 'url(' + canvas.toDataURL('image/png') + ')';

    // Clouds

    var container;
    var camera, scene, renderer, sky, mesh, geometry, material,
            i, h, color, colors = [], sprite, size, x, y, z;

    var mouseX = 0, mouseY = 0;
    var start_time = new Date().getTime();

    var windowHalfX = window.innerWidth / 2;
    var windowHalfY = window.innerHeight / 2;

    init();
    animate();

    function init() {

        container = document.createElement( 'div' );
        document.body.appendChild( container );

        camera = new THREE.Camera( 30, window.innerWidth / window.innerHeight, 1, 3000 );
        camera.position.z = 6000;

        scene = new THREE.Scene();

        geometry = new THREE.Geometry();

        var texture = THREE.ImageUtils.loadTexture( 'images/cloud10.png' );
        texture.magFilter = THREE.LinearMipMapLinearFilter;
        texture.minFilter = THREE.LinearMipMapLinearFilter;

        var fog = new THREE.Fog( 0x4584b4, - 100, 3000 );

        material = new THREE.MeshShaderMaterial( {

            uniforms: {

                "map": { type: "t", value:2, texture: texture },
                "fogColor" : { type: "c", value: fog.color },
                "fogNear" : { type: "f", value: fog.near },
                "fogFar" : { type: "f", value: fog.far },

            },
            vertexShader: document.getElementById( 'vs' ).textContent,
            fragmentShader: document.getElementById( 'fs' ).textContent,
            depthTest: false

        } );

        var plane = new THREE.Mesh( new THREE.Plane( 64, 64 ) );

        for ( i = 0; i < 8000; i++ ) {

            plane.position.x = Math.random() * 1000 - 500;
            plane.position.y = - Math.random() * Math.random() * 200 - 15;
            plane.position.z = i;
            plane.rotation.z = Math.random() * Math.PI;
            plane.scale.x = plane.scale.y = Math.random() * Math.random() * 1.5 + 0.5;

            GeometryUtils.merge( geometry, plane );

        }

        mesh = new THREE.Mesh( geometry, material );
        scene.addObject( mesh );

        mesh = new THREE.Mesh( geometry, material );
        mesh.position.z = - 8000;
        scene.addObject( mesh );

        renderer = new THREE.WebGLRenderer( { antialias: false } );
        renderer.setSize( window.innerWidth, window.innerHeight );
        container.appendChild( renderer.domElement );

        document.addEventListener( 'mousemove', onDocumentMouseMove, false );
        window.addEventListener( 'resize', onWindowResize, false );

    }

    function onDocumentMouseMove( event ) {

        mouseX = ( event.clientX - windowHalfX ) * 0.25;
        mouseY = ( event.clientY - windowHalfY ) * 0.15;

    }

    function onWindowResize( event ) {

        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize( window.innerWidth, window.innerHeight );

    }

    function animate() {

        requestAnimationFrame( animate );
        render();

    }

    function render() {

        position = ( ( new Date().getTime() - start_time ) * 0.03 ) % 8000;

        camera.position.x += ( mouseX - camera.target.position.x ) * 0.01;
        camera.position.y += ( - mouseY - camera.target.position.y ) * 0.01;
        camera.position.z = - position + 8000;

        camera.target.position.x = camera.position.x;
        camera.target.position.y = camera.position.y;
        camera.target.position.z = camera.position.z - 1000;

        renderer.render( scene, camera );

    }

</script><!-- owl_login -->
<script>
    $(window).load(function () {
        setTimeout(function () {
            $(".loading-box").fadeOut(500);
        }, 3000);
    });
</script><!-- owl_login -->
</body>
</html>