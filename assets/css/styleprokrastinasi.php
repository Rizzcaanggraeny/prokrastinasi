*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    background:#f5f5f5;
}

/* Navbar */
nav{
    background:white;
    padding:15px 0;
    position:fixed;
    width:100%;
    top:0;
    left:0;
    z-index:1000;
}

nav ul{
    display:flex;
    justify-content:center;
    align-items:center;
    list-style:none;
    gap:50px;
}

nav a{
    text-decoration:none;
    color:black;
    font-weight:bold;
    font-size:20px;
    transition:0.3s;
}

nav a:hover{
    color:#666;
}

/* Banner */
.hero{
    width:100%;
    height:100vh;
    overflow:hidden;
}

.hero img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

/* Area Hitam */
.black-section{
    background:#000;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:50px;
}

/* Tulisan */
.quote{
    color:white;
    font-size:28px;
    text-align:center;
    line-height:1.6;
    
    /* Awalnya hilang */
    opacity:0;

    /* Efek muncul */
    transition:opacity 0.8s ease;
}

/* Muncul saat cursor masuk area hitam */
.black-section:hover .quote{
    opacity:1;
}