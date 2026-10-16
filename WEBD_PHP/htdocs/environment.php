<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VertiPlant | Plant Environment</title>
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

    .top-nav span { white-space: nowrap; }

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
      gap: 0;
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

    .step-circle {
      z-index: 1;
      width: 38px;
      height: 38px;
      flex: 0 0 38px;
      border: 2px solid #888;
      border-radius: 50%;
      background: #fff;
    }

    .step.active .step-circle {
      position: relative;
      border: 2px solid var(--green);
    }

    .step.active .step-circle::after {
      position: absolute;
      inset: 8px;
      border-radius: 50%;
      background: var(--green);
      content: "";
    }

    .step strong, .step small { display: block; }
    .step small { color: #666; font-size: 12px; }

    .sidebar-back {
      position: absolute;
      right: 26px;
      bottom: 26px;
      left: 26px;
    }

    main {
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
      color: #999;
      font-size: 18px;
      font-weight: 700;
    }

    .step-badge {
      padding: 4px 15px;
      border-radius: 20px;
      background: #b2d5b5;
      color: #477553;
      font-size: 12px;
      white-space: nowrap;
    }

    .fields {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 18px 20px;
      padding: 23px;
      margin: 28px 3px 0;
      border-radius: 15px;
      background: #f5f5f5;
      box-shadow: 0 3px 8px #00000012;
    }

    .field label {
      display: block;
      margin: 0 0 7px 3px;
      color: var(--dark-green);
      font-size: 15px;
      font-weight: 700;
    }

    .field input, .field select {
      width: 100%;
      height: 40px;
      padding: 0 11px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fff;
      color: #555;
      font: inherit;
    }

    .field.full { grid-column: 1 / -1; }

    .hint {
      display: block;
      margin: 5px 3px 0;
      color: #777;
      font-size: 11px;
    }

    .actions {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      padding: 19px 7px;
    }

    .button {
      min-width: 150px;
      height: 41px;
      padding: 0 22px;
      border: 0;
      border-radius: 24px;
      font-weight: 700;
      cursor: pointer;
    }

    .button.back { background: #e9e9e9; }
    .button.continue { background: var(--green); }

    @media (max-width: 760px) {
      .topbar { padding: 0 16px; }
      .top-nav { gap: 14px; }
      .top-nav span:nth-child(2), .top-nav span:nth-child(3) { display: none; }
      .page { grid-template-columns: 1fr; }
      .sidebar { padding: 18px; border-right: 0; }
      .sidebar h2 { margin-bottom: 12px; }
      .steps { grid-template-columns: repeat(3, 1fr); }
      .steps::before { display: none; }
      .step { min-height: auto; align-items: flex-start; }
      .step-circle { width: 30px; height: 30px; flex-basis: 30px; }
      .step.active .step-circle::after { inset: 6px; }
      .sidebar-back { display: none; }
      main { padding: 25px 16px; }
      .fields { padding: 16px; }
    }

    @media (max-width: 520px) {
      .brand { font-size: 25px; }
      .top-nav { font-size: 12px; }
      .fields { grid-template-columns: 1fr; }
      .field.full { grid-column: auto; }
      .actions { padding-right: 0; padding-left: 0; }
      .button { min-width: 0; flex: 1; }
    }
  </style>
</head>
<body>
  <header class="topbar">
    <div class="brand"><span class="brand-mark" aria-hidden="true">♧</span> VertiPlant</div>
    <nav class="top-nav" aria-label="Main navigation">
      <span>▦ &nbsp;Dashboard</span>
      <span>♧ &nbsp;Manage Plants</span>
      <span>⚙ &nbsp;Settings</span>
      <span aria-label="Notifications">♧</span>
    </nav>
  </header>

  <div class="page">
    <aside class="sidebar">
      <h2>Plant Registration</h2>
      <div class="steps" aria-label="Registration progress">
        <div class="step">
          <span class="step-circle"></span>
          <span><strong>Basic Info</strong><small>Type, Module, Dates</small></span>
        </div>
        <div class="step active" aria-current="step">
          <span class="step-circle"></span>
          <span><strong>Environment</strong><small>Lighting, Nutrients</small></span>
        </div>
        <div class="step">
          <span class="step-circle"></span>
          <span><strong>Review</strong><small>Confirm Details</small></span>
        </div>
      </div>
      <button class="button continue sidebar-back" type="button">← &nbsp; Go Back</button>
    </aside>

    <main>
      <h1>Register New Plant</h1>

      <section class="form-card" aria-labelledby="environment-title">
        <div class="form-heading">
          <span id="environment-title">Environment Settings</span>
          <span class="step-badge">Step 2 of 3</span>
        </div>

        <form>
          <div class="fields">
            <div class="field">
              <label for="grow-zone">Growing zone / rack</label>
              <select id="grow-zone" name="grow-zone">
                <option value="">Select a rack or zone</option>
                <option>Rack A — Level 1</option>
                <option>Rack A — Level 2</option>
                <option>Rack B — Level 1</option>
                <option>Rack B — Level 2</option>
              </select>
            </div>

            <div class="field">
              <label for="light-type">Grow light type</label>
              <select id="light-type" name="light-type">
                <option value="">Select light type</option>
                <option>Full-spectrum LED</option>
                <option>Red/blue LED</option>
                <option>White LED</option>
              </select>
            </div>

            <div class="field">
              <label for="ppfd">Light intensity (PPFD)</label>
              <input id="ppfd" name="ppfd" type="number" min="0" placeholder="e.g. 250">
              <small class="hint">Measured in µmol/m²/s</small>
            </div>

            <div class="field">
              <label for="photoperiod">Daily light schedule</label>
              <select id="photoperiod" name="photoperiod">
                <option value="">Select hours of light</option>
                <option>12 hours light / 12 hours dark</option>
                <option>16 hours light / 8 hours dark</option>
                <option>18 hours light / 6 hours dark</option>
                <option>24 hours light</option>
              </select>
            </div>

            <div class="field">
              <label for="temperature">Air temperature (°C)</label>
              <input id="temperature" name="temperature" type="number" step="0.1" placeholder="e.g. 22">
            </div>

            <div class="field">
              <label for="humidity">Relative humidity (%)</label>
              <input id="humidity" name="humidity" type="number" min="0" max="100" placeholder="e.g. 60">
            </div>

            <div class="field">
              <label for="ph">Nutrient solution pH</label>
              <input id="ph" name="ph" type="number" min="0" max="14" step="0.1" placeholder="e.g. 6.0">
            </div>

            <div class="field">
              <label for="ec">Nutrient strength (EC)</label>
              <input id="ec" name="ec" type="number" min="0" step="0.1" placeholder="e.g. 1.8 mS/cm">
            </div>

            <div class="field full">
              <label for="irrigation">Irrigation schedule</label>
              <select id="irrigation" name="irrigation">
                <option value="">Select irrigation frequency</option>
                <option>Continuous recirculation</option>
                <option>Every 2 hours</option>
                <option>Every 4 hours</option>
                <option>Custom schedule</option>
              </select>
            </div>
          </div>

          <div class="actions">
            <button class="button back" type="button">← &nbsp; Go Back</button>
            <button class="button continue" type="submit">Continue &nbsp; →</button>
          </div>
        </form>
      </section>
    </main>
  </div>
</body>
</html>