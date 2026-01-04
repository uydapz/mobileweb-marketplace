<link href="https://fonts.googleapis.com/css2?family=Just+Me+Again+Down+Here&display=swap" rel="stylesheet">
<div id="preloader" class="preloader-wrapper">
  <div class="preloader-inner">
    <img src="assets/images/logos/loader.webp" alt="NDEXO Loader" class="preloader-logo">
    <p class="preloader-text">open culture gates</p>
  </div>
</div>

<style>
  .preloader-wrapper {
    position: fixed;
    inset: 0;
    background: linear-gradient(145deg, #5C3A1A, #3C2810);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    transition: opacity 1s ease, visibility 1s ease;
  }

  .preloader-wrapper.fade-out {
    opacity: 0;
    visibility: hidden;
  }

  .preloader-inner {
    text-align: center;
    position: relative;
    z-index: 10;
  }

  .preloader-logo {
    width: 90px;
    opacity: 0;
    transform: scale(0.7);
    animation: grow-fade 2.5s ease forwards, shake 0.25s ease-in-out 0.8s;
    filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.3));
  }

  @keyframes grow-fade {
    0% { transform: scale(0.6); opacity: 0; }
    40% { transform: scale(1.15); opacity: 1; }
    100% { transform: scale(1); opacity: 1; }
  }

  @keyframes shake {
    0%{transform:translateX(0);}
    25%{transform:translateX(-2px);}
    50%{transform:translateX(2px);}
    75%{transform:translateX(-1px);}
    100%{transform:translateX(0);}
  }

  .preloader-text {
    font-size: 4rem;
    font-weight: 500;
    font-family: 'just me again down here';
    color: #FFF;
    margin-top: 1rem;
    opacity: 0;
    animation: fadeText 1s ease forwards 1s;
    letter-spacing: 1px;
  }

  @keyframes fadeText {
    0% { opacity:0; transform:translateY(8px); }
    100% { opacity:1; transform:translateY(0); }
  }
</style>

<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    // Delay sedikit supaya animasi tampil enak dilihat
    setTimeout(() => {
      preloader.classList.add("fade-out");
      setTimeout(() => preloader.remove(), 1000); // Fade-out smooth 1 detik
    }, 2000); // tampil sekitar 2 detik total
  });
</script>
