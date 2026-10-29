<?php require_once 'sessionManager.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VertiPlant | Plant Profile</title>
  <style>
    :root {
      font-family: Arial, sans-serif;
      color: #171717;
      background: #fff;
      --green: #16df2d;
      --dark-green: #386b48;
      --line-green: #b5d2b8;
      --panel: #f5f5f5;
    }

    * { box-sizing: border-box; }

    body {
      min-width: 320px;
      margin: 0;
    }

    .topbar {
      min-height: 73px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
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
      white-space: nowrap;
    }

    .brand-mark { font-size: 38px; }

    .top-nav {
      display: flex;
      align-items: center;
      gap: 32px;
      font-size: 13px;
    }

    .top-nav a {
      color: inherit;
      text-decoration: none;
      white-space: nowrap;
    }

    .top-nav a:hover { color: var(--dark-green); }

    main {
      width: min(1280px, 100%);
      padding: 36px 28px 48px;
      margin: 0 auto;
    }

    .location {
      margin: 0 0 8px;
      color: #666;
      font-size: 13px;
      font-weight: 700;
    }

    .page-heading {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 18px;
      margin-bottom: 22px;
    }

    h1 {
      margin: 0;
      color: var(--dark-green);
      font-size: 30px;
    }

    .button {
      display: inline-flex;
      min-height: 41px;
      align-items: center;
      justify-content: center;
      padding: 0 22px;
      border: 0;
      border-radius: 24px;
      background: var(--green);
      color: #111;
      font: inherit;
      font-weight: 700;
      text-decoration: none;
      white-space: nowrap;
      cursor: pointer;
    }

    .button:hover { background: #10c925; }

    .profile-grid {
      display: grid;
      grid-template-columns: minmax(250px, 0.9fr) minmax(300px, 1.1fr) minmax(300px, 1.1fr);
      gap: 20px;
      align-items: start;
    }

    .card {
      min-width: 0;
      overflow: hidden;
      border: 1px solid #d2d2d2;
      border-radius: 14px;
      background: #fff;
      box-shadow: 0 2px 5px #00000012;
    }

    .plant-photo {
      display: block;
      width: 100%;
      height: 220px;
      object-fit: cover;
      background: var(--panel);
    }

    .card-content { padding: 20px; }

    .card h2 {
      margin: 0 0 16px;
      color: var(--dark-green);
      font-size: 18px;
    }

    .identity-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px 20px;
      margin: 0;
    }

    .identity-list div { min-width: 0; }

    .identity-list dt,
    .metric-label {
      margin-bottom: 5px;
      color: #666;
      font-size: 12px;
    }

    .identity-list dd {
      margin: 0;
      color: #222;
      font-size: 14px;
      font-weight: 700;
      overflow-wrap: anywhere;
    }

    .growth-note {
      margin: 0;
      color: #555;
      font-size: 14px;
      line-height: 1.6;
    }

    .harvest-panel {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding: 17px 20px;
      margin-top: 16px;
      border-radius: 12px;
      background: var(--panel);
    }

    .harvest-label {
      margin: 0 0 6px;
      color: #666;
      font-size: 12px;
      font-weight: 700;
    }

    .harvest-date {
      margin: 0;
      color: var(--dark-green);
      font-size: 18px;
      font-weight: 700;
    }

    .days-count {
      display: grid;
      width: 70px;
      height: 70px;
      flex: 0 0 70px;
      place-content: center;
      border-radius: 12px;
      background: #b2d5b5;
      color: var(--dark-green);
      text-align: center;
    }

    .days-count strong { font-size: 24px; }
    .days-count span { font-size: 11px; }

    .metrics-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 12px;
    }

    .metric {
      min-height: 104px;
      padding: 16px;
      border: 1px solid #e2e2e2;
      border-radius: 12px;
      background: var(--panel);
    }

    .metric-value {
      margin: 0;
      color: var(--dark-green);
      font-size: 24px;
      font-weight: 700;
    }

    .actions-card { margin-top: 16px; }

    .actions-card h2 { margin-bottom: 10px; }

    .action-message {
      margin: 0;
      padding: 12px 14px;
      border-left: 4px solid var(--green);
      border-radius: 5px;
      background: #fff;
      color: #444;
      font-size: 14px;
    }

    @media (max-width: 950px) {
      .profile-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .metrics-card { grid-column: 1 / -1; }
      .metrics-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
    }

    @media (max-width: 650px) {
      .topbar { padding: 12px 16px; }
      .top-nav { gap: 14px; }
      .top-nav a:nth-child(3) { display: none; }
      main { padding: 26px 16px 36px; }
      .page-heading { align-items: flex-start; }
      h1 { font-size: 25px; }
      .profile-grid { grid-template-columns: 1fr; }
      .metrics-card { grid-column: auto; }
      .metrics-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 420px) {
      .brand { font-size: 25px; }
      .brand-mark { font-size: 30px; }
      .top-nav { gap: 10px; font-size: 12px; }
      .page-heading { flex-direction: column; }
      .page-heading .button { width: 100%; }
    }
  </style>
</head>
<body>
  <header class="topbar">
    <div class="brand">
      <span class="brand-mark" aria-hidden="true">♧</span>
      VertiPlant
    </div>

    <nav class="top-nav" aria-label="Main navigation">
      <a href="Dashboard.php">▦ &nbsp;Dashboard</a>
      <a href="ManagePlants.php">♧ &nbsp;Manage Plants</a>
      <a href="index.php">⚙ &nbsp;Settings</a>
    </nav>
  </header>

  <main>
    <p class="location">Tower A-1</p>

    <div class="page-heading">
      <h1>Butterhead Lettuce</h1>
      <a class="button" href="plant_registration.php">＋ Register Plant</a>
    </div>

    <section class="profile-grid" aria-label="Plant profile details">
      <article class="card">
        <img class="plant-photo" src="lettuce.jpg" alt="Butterhead lettuce growing in a vertical farm">

        <div class="card-content">
          <h2>Identity</h2>
          <dl class="identity-list">
            <div>
              <dt>Plant Type</dt>
              <dd>Asteraceae</dd>
            </div>
            <div>
              <dt>Scientific Name</dt>
              <dd>Lactuca sativa</dd>
            </div>
            <div>
              <dt>Date Planted</dt>
              <dd>Oct 12, 2026</dd>
            </div>
            <div>
              <dt>Fertilizer Level</dt>
              <dd>6 - 6 - 4</dd>
            </div>
          </dl>
        </div>
      </article>

      <section>
        <article class="card">
          <div class="card-content">
            <h2>Growth Stage</h2>
            <p class="growth-note">
              Consistent growth rate observed. Canopy closure expected in 4 days.
            </p>
          </div>
        </article>

        <div class="harvest-panel">
          <div>
            <p class="harvest-label">EST. HARVEST</p>
            <p class="harvest-date">Nov. 28, 2026</p>
          </div>
          <div class="days-count" aria-label="14 days until estimated harvest">
            <strong>14</strong>
            <span>Days</span>
          </div>
        </div>
      </section>

      <section class="metrics-card">
        <article class="card">
          <div class="card-content">
            <h2>Growing Conditions</h2>
            <div class="metrics-grid">
              <div class="metric">
                <p class="metric-label">Air Temp</p>
                <p class="metric-value">24.4 °C</p>
              </div>
              <div class="metric">
                <p class="metric-label">Humidity</p>
                <p class="metric-value">65%</p>
              </div>
              <div class="metric">
                <p class="metric-label">DLI</p>
                <p class="metric-value">14.2</p>
              </div>
              <div class="metric">
                <p class="metric-label">Water Pressure</p>
                <p class="metric-value">25 PSI</p>
              </div>
            </div>
          </div>
        </article>

        <article class="card actions-card">
          <div class="card-content">
            <h2>Recommended Actions</h2>
            <p class="action-message">Lower water pressure.</p>
          </div>
        </article>
      </section>
    </section>
  </main>
</body>
</html>