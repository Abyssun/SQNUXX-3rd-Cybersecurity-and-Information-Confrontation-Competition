<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>签到题</title>
  <script src="static/jquery.min.js"></script>
  <script src="static/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/normalize.css">
  <style>
    .answer-button {
      background-color: #ddf;
    }

    .answer-button:active,
    .answer-button.active {
      background-color: #8af;
    }

    .input-box {
      width: 100%;
      padding: 8px;
      margin: 5px 0;
      border: 2px solid #38d;
      border-radius: 8px;
    }

    .correct {
      border-color: #5e5;
      background-color: #dfd;
    }

    .wrong {
      border-color: #e55;
      background-color: #fdd;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-10px);
      }

      75% {
        transform: translateX(10px);
      }
    }

    .shake {
      animation: shake 0.3s ease-in-out;
    }
  </style>
</head>

<body ontouchstart=""
  style="min-height: 100vh; padding: 40px 20px; display: flex; justify-content: center; background-image: url('./tupian.jpg'); background-size: cover">
  <div style="flex: 0 1 450px; display: flex; flex-direction: column; justify-content: center; gap: 30px">
    <h1 style="margin: 0; text-align: center">
      签到
    </h1>

    <p style="margin: 0; text-align: center">
      请在 150 秒内输入 12 种不同语言的启动
    </p>
    <p style="margin: 0; text-align: center; color: #777; font-size: 0.9em;">
      <b><?php
          if(isset($_GET['pass'])){
              $pass = $_GET['pass'];

              if($pass == 'false'){
                  echo "只需要输入冒号之后的内容即可。";
              }
              else{
                  echo "TYCTF{test_flag}";
              }
          }
          else{
              echo "只需要输入冒号之后的内容即可。";
          }
      ?></b>
    </p>

    
    

    <div id="timer" style="text-align: center; font-size: 24px;">150:00</div>

    <div id="inputs-container">
      <input type="text" class="input-box" id="zh" placeholder="中文：启动" onpaste="return false">
      <input type="text" class="input-box" id="en" placeholder="English: Start" onpaste="return false">
      <input type="text" class="input-box" id="ja" placeholder="日本語：起動" onpaste="return false">
      <input type="text" class="input-box" id="ko" placeholder="한국어：시작" onpaste="return false">
      <input type="text" class="input-box" id="fr" placeholder="Français: Démarrer" onpaste="return false">
      <input type="text" class="input-box" id="de" placeholder="Deutsch: Starten" onpaste="return false">
      <input type="text" class="input-box" id="es" placeholder="Español: Iniciar" onpaste="return false">
      <input type="text" class="input-box" id="ru" placeholder="Русский: Запуск" onpaste="return false">
      <input type="text" class="input-box" id="it" placeholder="Italiano: Avviare" onpaste="return false">
      <input type="text" class="input-box" id="eo" placeholder="Esperanto: Startigi" onpaste="return false">
      <input type="text" class="input-box" id="vi" placeholder="Tiếng Việt: Khởi động" onpaste="return false">
      <input type="text" class="input-box" id="ak" placeholder="𒀝𒅗𒁺𒌑：𒁺" onpaste="return false">
    </div>

    <button id="submit-button" class="btn btn-primary" style="width: 100%; margin-top: 10px;" onclick="submitResult()">
      等不及了，马上启动！
    </button>
  </div>

  <script>
    const answers = {
      zh: "启动",
      en: "Start",
      ja: "起動",
      ko: "시작",
      fr: "Démarrer",
      de: "Starten",
      es: "Iniciar",
      ru: "Запуск",
      it: "Avviare",
      eo: "Startigi",
      vi: "Khởi động",
      ak: "𒁺",
    };

    let timerStarted = false;
    let timeLeft = 150;
    let timer = null;

    function startTimer() {
      if (!timerStarted) {
        timerStarted = true;
        timer = setInterval(() => {
          timeLeft -= 0.1;
          document.getElementById('timer').textContent = timeLeft.toFixed(1);

          if (timeLeft <= 0) {
            clearInterval(timer);
            submitResult();
          }
        }, 100);
      }
    }

    function submitResult() {
      const inputs = document.querySelectorAll('.input-box');
      let allCorrect = true;

      inputs.forEach(input => {
        if (input.value !== answers[input.id]) {
          allCorrect = false;
          input.classList.add('wrong');
        } else {
          input.classList.add('correct');
        }
      });

      window.location = `?pass=${allCorrect}`;
    }

    document.querySelectorAll('.input-box').forEach(input => {
      input.addEventListener('input', (e) => {
        const value = e.target.value;
        if (value) {
          if (value === answers[e.target.id]) {
            e.target.classList.remove('wrong');
            e.target.classList.add('correct');
          } else {
            e.target.classList.remove('correct');
            e.target.classList.add('wrong');
          }
        } else {
          e.target.classList.remove('correct', 'wrong');
        }
      });

      input.addEventListener('paste', e => {
        e.preventDefault();
        const element = e.target;
        element.classList.remove('shake');
        void element.offsetWidth;
        element.classList.add('shake');
        element.addEventListener('animationend', () => {
          element.classList.remove('shake');
        }, { once: true });
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      const existingAudio = document.querySelector('#hg-audio');
      const inputs = document.querySelectorAll('.input-box');

      if (!existingAudio) {
        const audio = new Audio('./static/swmcq.mp3');
        audio.loop = true;
        inputs.forEach(input => {
          input.addEventListener('click', function startMusic() {
            startTimer();
            audio.play().catch(function (error) {
              console.log("播放失败：", error);
            });
            inputs.forEach(input => {
              input.removeEventListener('click', startMusic);
            });
          }, { once: true });
        });
      } else {
        inputs.forEach(input => {
          input.addEventListener('click', function startFunction() {
            startTimer();
            inputs.forEach(input => {
              input.removeEventListener('click', startFunction);
            });
          }, { once: true });
        });
      }
    });
  </script>
</body>

</html>