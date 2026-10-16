<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VertiPlant | Register New Plant</title>
  <style>
    :root {
      font-family: Arial, sans-serif;
      color: #171717;
      background: #fff;
      --green: #16df2d;
      --dark-green: #386b48;
      --line-green: #b5d2b8;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      min-width: 320px;
    }

    .topbar {
      height: 73px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      background: #dedede;
      border: 1px solid var(--line-green);
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 8px;
      color: var(--dark-green);
      font: italic 32px Georgia, serif;
    }

    .brand-mark { font-size: 38px; }

    .top-nav {
      display: flex;
      align-items: center;
      gap: 38px;
      font-size: 13px;
    }

    .top-nav a {
      color: inherit;
      text-decoration: none;
      white-space: nowrap;
    }

    .page {
      min-height: calc(100vh - 73px);
      display: grid;
      grid-template-columns: 254px minmax(0, 1fr);
    }

    .sidebar {
      position: relative;
      padding: 27px 26px;
      background: #dedede;
      border-right: 1px solid var(--line-green);
    }

    .sidebar h2 {
      margin: 0 0 28px 4px;
      color: var(--dark-green);
      font-size: 22px;
    }

    .steps {
      position: relative;
      display: grid;
      padding: 0;
      margin: 0;
      list-style: none;
    }

    .steps::before {
      position: absolute;
      top: 22px;
      bottom: 22px;
      left: 27px;
      width: 3px;
      background: #aaa;
      content: "";
    }

    .step {
      position: relative;
      display: flex;
      align-items: center;
      min-height: 82px;
      gap: 8px;
      font-size: 12px;
    }

    .step-marker {
      z-index: 1;
      width: 38px;
      height: 38px;
      flex: 0 0 38px;
      border: 2px solid #888;
      border-radius: 50%;
      background: #fff;
    }

    .step.active .step-marker {
      position: relative;
      border: 2px solid var(--green);
    }

    .step.active .step-marker::after {
      position: absolute;
      inset: 8px;
      border-radius: 50%;
      background: var(--green);
      content: "";
    }

    .step-copy strong,
    .step-copy span {
      display: block;
    }

    .step-copy span { color: #666; }

    .sidebar-back {
      position: absolute;
      right: 26px;
      bottom: 26px;
      left: 26px;
    }

    .registration-main {
      width: 100%;
      max-width: 1100px;
      padding: 40px 24px;
      margin: 0 auto;
    }

    h1 {
      margin: 0 0 17px;
      color: var(--dark-green);
      font-size: 30px;
    }

    .form-card {
      padding: 11px 14px 28px;
      border: 1px solid #d2d2d2;
      border-radius: 14px;
      box-shadow: 0 2px 3px #0002;
    }

    .form-heading {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 0 0 12px;
      border-bottom: 2px solid #dedede;
    }

    .plant-name-label {
      display: flex;
      align-items: center;
      gap: 9px;
      width: min(70%, 500px);
    }

    .plant-name-label input {
      width: 100%;
      padding: 5px 0;
      border: 0;
      outline: 0;
      background: transparent;
      color: #777;
      font: inherit;
      font-size: 18px;
      font-weight: 700;
    }

    .plant-name-label input::placeholder { color: #999; }

    .edit-icon {
      color: #777;
      font-size: 20px;
    }

    .step-count {
      padding: 4px 15px;
      border-radius: 20px;
      background: #b2d5b5;
      color: #477553;
      font-size: 12px;
      white-space: nowrap;
    }

    .fields-panel {
      display: grid;
      gap: 18px;
      padding: 23px;
      margin: 28px 3px 0;
      border-radius: 15px;
      background: #f5f5f5;
      box-shadow: 0 3px 8px #00000012;
    }

    .form-field label {
      display: block;
      margin: 0 0 7px 3px;
      color: var(--dark-green);
      font-size: 15px;
      font-weight: 700;
    }

    .form-field input,
    .form-field select {
      width: 100%;
      height: 40px;
      padding: 0 11px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fff;
      color: #555;
      font: inherit;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      padding: 19px 7px;
    }

    .button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 150px;
      height: 41px;
      padding: 0 22px;
      border: 0;
      border-radius: 24px;
      color: #111;
      font-weight: 700;
      text-decoration: none;
      cursor: pointer;
    }

    .back-button { background: #e9e9e9; }
    .continue-button,
    .sidebar-back { background: var(--green); }

    @media (max-width: 760px) {
      .topbar { padding: 0 16px; }
      .top-nav { gap: 14px; }
      .top-nav a:nth-child(2),
      .top-nav a:nth-child(3) { display: none; }
      .page { grid-template-columns: 1fr; }
      .sidebar { padding: 18px; border-right: 0; }
      .sidebar h2 { margin-bottom: 12px; }
      .steps { grid-template-columns: repeat(3, 1fr); }
      .steps::before { display: none; }
      .step { min-height: auto; align-items: flex-start; }
      .step-marker { width: 30px; height: 30px; flex-basis: 30px; }
      .step.active .step-marker::after { inset: 6px; }
      .sidebar-back { display: none; }
      .registration-main { padding: 25px 16px; }
      .fields-panel { padding: 16px; }
    }

    @media (max-width: 520px) {
      .brand { font-size: 25px; }
      .top-nav { font-size: 12px; }
      .form-actions { padding-right: 0; padding-left: 0; }
      .button { min-width: 0; flex: 1; }
    }
  </style>
</head>
<body>
  <header class="topbar">
    <div class="brand"><span class="brand-mark" aria-hidden="true">♧</span> VertiPlant</div>
    <nav class="top-nav" aria-label="Main navigation">
      <a href="Dashboard.php">▦ &nbsp;Dashboard</a>
      <a href="ManagePlants.php">♧ &nbsp;Manage Plants</a>
      <a href="#">⚙ &nbsp;Settings</a>
      <a href="#" aria-label="Notifications">♧</a>
    </nav>
  </header>

  <div class="page">
    <aside class="sidebar">
      <h2>Plant Registration</h2>

      <ol class="steps" aria-label="Registration progress">
        <li class="step active" aria-current="step">
          <span class="step-marker" aria-hidden="true"></span>
          <div class="step-copy">
            <strong>Basic Info</strong>
            <span>Type, Module, Dates</span>
          </div>
        </li>
        <li class="step">
          <span class="step-marker" aria-hidden="true"></span>
          <div class="step-copy">
            <strong>Environment</strong>
            <span>Lighting, Nutrients</span>
          </div>
        </li>
        <li class="step">
          <span class="step-marker" aria-hidden="true"></span>
          <div class="step-copy">
            <strong>Review</strong>
            <span>Confirm Details</span>
          </div>
        </li>
      </ol>

      <a class="button sidebar-back" href="Dashboard.php">← &nbsp; Go Back</a>
    </aside>

    <main class="registration-main">
      <h1>Register New Plant</h1>

      <form class="form-card" action="environment.php" method="post">
        <div class="form-heading">
          <label class="plant-name-label" for="plant-name">
            <input
              id="plant-name"
              name="plant_name"
              type="text"
              placeholder="Enter Plant Name"
              required
            >
            <span class="edit-icon" aria-hidden="true">✎</span>
          </label>
          <span class="step-count">Step 1 of 3</span>
        </div>

        <div class="fields-panel">
          <div class="form-field">
            <label for="plant-type">Plant Type</label>
            <select id="plant-type" name="plant_type" required>
              <option value="" selected disabled>Select plant type</option>
              <option value="vegetable">Vegetable</option>
              <option value="herb">Herb</option>
              <option value="flower">Flower</option>
              <option value="fruit">Fruit</option>
              <option value="ornamental">Ornamental</option>
            </select>
          </div>

          <div class="form-field">
            <label for="plant-module">Plant Module</label>
            <select id="plant-module" name="plant_module" required>
              <option value="" selected disabled>Select plant module</option>
              <option value="module-1">Module 1</option>
              <option value="module-2">Module 2</option>
              <option value="module-3">Module 3</option>
            </select>
          </div>

          <div class="form-field">
            <label for="seed-date">Date of Seed Planted</label>
            <input id="seed-date" name="seed_date" type="date" required>
          </div>
        </div>

        <div class="form-actions">
          <a class="button back-button" href="javascript:history.back()">← &nbsp; Go Back</a>
          <button class="button continue-button" type="submit">Continue &nbsp; →</button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
