<style>
  #wave_wrap {
    display: flex;
    max-width: 950px;
    cursor: pointer;
  }

  #progress {
    z-index: 1;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
  }

  #progress .progress-bar {
    width: 50%;
    height: 100%;
  }

  #progress_over {
    height: 100%;
    z-index: 2;
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    opacity: 0.8;
  }

  .pause_i {
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0iTTIgMmg1djEyaC01ek05IDJoNXYxMmgtNXoiPjwvcGF0aD48L3N2Zz4=) no-repeat center center;
    background-size: 22px;
  }

  .play_i {
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0iTTMgMmwxMCA2LTEwIDZ6Ij48L3BhdGg+PC9zdmc+) no-repeat center center;
    background-size: 27px;
  }

  .play_b {
    width: 80px;
    margin: 2%;
    z-index: 20;
    position: relative;
    cursor: pointer;
    opacity: 0.5;
    transition: all 0.2s;
    background-color: white;
  }

  .play_b:hover {
    opacity: 1;
  }
</style>