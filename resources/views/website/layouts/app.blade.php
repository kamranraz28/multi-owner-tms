<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropNest — Plans & Pricing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons (free, open source, premium quality) -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <!-- Fonts: Bricolage Grotesque (display) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300;12..96,400;12..96,500;12..96,700;12..96,800&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
<<<<<<< HEAD

=======
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
>>>>>>> c57bb21 (subscription module)
    <style>
        :root {
            --brand:        #1a56db;
            --brand-dark:   #1447b7;
            --brand-mid:    #2563eb;
            --brand-light:  #eff6ff;
            --brand-border: #bfdbfe;
            --teal:         #0d9488;
            --teal-light:   #f0fdfa;
            --amber:        #d97706;
            --amber-light:  #fffbeb;
            --amber-border: #fde68a;
            --green:        #059669;
            --green-light:  #ecfdf5;
            --red:          #dc2626;

            --ink:          #0d1526;
            --ink-2:        #1e2d45;
            --muted:        #5a6a85;
            --muted-2:      #8899b0;

            --surface:      #f4f7fb;
            --surface-2:    #eef2f8;
            --card:         #ffffff;
            --border:       #dde4ef;
            --border-2:     #c8d3e8;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--surface);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        .display { font-family: 'Bricolage Grotesque', sans-serif; }

        /* ══════════════════════════════════════
           TOP ANNOUNCEMENT BAR
        ══════════════════════════════════════ */
        #announce-bar {
            background: linear-gradient(90deg, #1447b7 0%, #1a56db 40%, #0891b2 100%);
            color: #fff;
            padding: 10px 20px;
            display: flex; align-items: center; justify-content: center; gap: 10px;
            font-size: 13px; font-weight: 600; letter-spacing: 0.01em;
            position: relative; z-index: 200;
        }
        #announce-bar .tag {
            background: rgba(255,255,255,0.2); border-radius: 20px;
            padding: 2px 10px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        #announce-bar a {
            color: #fff; font-weight: 700; text-decoration: none;
            border-bottom: 1.5px solid rgba(255,255,255,0.5);
            padding-bottom: 1px; margin-left: 6px; transition: border-color 0.2s;
        }
        #announce-bar a:hover { border-color: #fff; }
        #close-bar {
            position: absolute; right: 16px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: rgba(255,255,255,0.7); cursor: pointer;
            display: flex; align-items: center; padding: 4px;
            transition: color 0.2s;
        }
        #close-bar:hover { color: #fff; }

        /* ══════════════════════════════════════
           NAVBAR
        ══════════════════════════════════════ */
        .navbar {
            position: sticky; top: 0; z-index: 100;
            background: rgba(244, 247, 251, 0.9);
            backdrop-filter: saturate(200%) blur(24px);
            -webkit-backdrop-filter: saturate(200%) blur(24px);
            border-bottom: 1px solid var(--border);
            transition: box-shadow 0.3s ease;
        }
        .navbar.elevated { box-shadow: 0 2px 32px rgba(13,21,38,0.09); }

        .nav-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 28px;
            height: 68px; display: flex; align-items: center; gap: 20px;
            justify-content: space-between;
        }

        .logo-wrap { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; }
        .logo-mark {
            width: 38px; height: 38px; border-radius: 11px;
            background: var(--ink); display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; position: relative; overflow: hidden;
        }
        .logo-mark::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 55%);
        }
        .logo-text { font-family: 'Bricolage Grotesque', sans-serif; font-size: 19px; font-weight: 800; color: var(--ink); letter-spacing: -0.04em; }
        .logo-text em { color: var(--brand); font-style: normal; }

        .nav-center { flex: 1; display: flex; align-items: center; justify-content: center; gap: 2px; }
        .nav-link {
            padding: 7px 14px; border-radius: 8px; font-size: 14px; font-weight: 600;
            color: var(--muted); text-decoration: none; transition: all 0.15s; white-space: nowrap;
            letter-spacing: -0.01em; display: flex; align-items: center; gap: 5px;
        }
        .nav-link:hover { color: var(--ink); background: rgba(255,255,255,0.8); }
        .nav-link.active { color: var(--brand); background: var(--brand-light); }

        .nav-badge-new {
            font-size: 9px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em;
            background: var(--brand); color: #fff; padding: 1px 5px; border-radius: 4px;
        }

        .nav-right { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }

        .btn-login {
            padding: 8px 18px; border-radius: 9px; border: 1.5px solid var(--border-2);
            background: transparent; color: var(--ink-2); font-family: inherit;
            font-size: 13.5px; font-weight: 600; cursor: pointer; transition: all 0.15s; white-space: nowrap;
        }
        .btn-login:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }

        .btn-signup {
            padding: 9px 20px; border-radius: 9px; background: var(--ink);
            color: #fff; font-family: inherit; font-size: 13.5px; font-weight: 700;
            border: none; cursor: pointer; display: flex; align-items: center; gap: 7px;
            transition: all 0.2s; white-space: nowrap; letter-spacing: -0.01em;
        }
        .btn-signup:hover { background: var(--brand); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(26,86,219,0.3); }
        .btn-signup .arrow { transition: transform 0.2s; }
        .btn-signup:hover .arrow { transform: translateX(3px); }

        .hamburger {
            display: none; padding: 7px; border-radius: 8px; border: 1.5px solid var(--border);
            background: var(--card); cursor: pointer; color: var(--muted); transition: all 0.15s;
        }
        .hamburger:hover { color: var(--ink); border-color: var(--border-2); }

        /* Mobile menu */
        .mobile-nav {
            display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 99;
            background: rgba(244,247,251,0.98); padding: 100px 28px 40px;
            flex-direction: column; gap: 6px; overflow-y: auto;
            padding-top: 145px !important;
        }
        .mobile-nav.open { display: flex; }
        .mobile-nav .nav-link { font-size: 18px; padding: 14px 18px; }
        .mobile-nav-actions { display: flex; flex-direction: column; gap: 10px; margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--border); }
        .mobile-nav-actions button { width: 100%; padding: 14px; font-size: 15px; }

        @media (max-width: 1024px) { .nav-center { display: none; } }
        @media (max-width: 640px) { .nav-right { display: none; } .hamburger { display: flex; } }

        /* ══════════════════════════════════════
           HERO
        ══════════════════════════════════════ */
        .hero {
            padding: 88px 28px 80px;
            text-align: center;
            background:
                radial-gradient(ellipse 80% 60% at 50% -10%, rgba(26,86,219,0.10) 0%, transparent 65%),
                radial-gradient(ellipse 50% 40% at 90% 50%, rgba(8,145,178,0.06) 0%, transparent 60%),
                var(--surface);
            position: relative; overflow: hidden;
        }

        /* Subtle grid mesh */
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 48px 48px;
            opacity: 0.4;
            mask-image: radial-gradient(ellipse 70% 55% at 50% 0%, black 0%, transparent 80%);
            pointer-events: none;
        }

        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 16px; border-radius: 100px;
            background: var(--card); border: 1.5px solid var(--border);
            box-shadow: 0 2px 10px rgba(13,21,38,0.06);
            font-size: 12.5px; font-weight: 700; color: var(--muted);
            letter-spacing: 0.04em; text-transform: uppercase; margin-bottom: 22px;
        }
        .hero-eyebrow .pulse {
            width: 8px; height: 8px; border-radius: 50%; background: var(--green);
            box-shadow: 0 0 0 0 rgba(5,150,105,0.4);
            animation: pulse-ring 2s ease infinite;
        }
        @keyframes pulse-ring {
            0%   { box-shadow: 0 0 0 0 rgba(5,150,105,0.5); }
            70%  { box-shadow: 0 0 0 7px rgba(5,150,105,0); }
            100% { box-shadow: 0 0 0 0 rgba(5,150,105,0); }
        }

        .hero h1 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(2.6rem, 5.5vw, 4.2rem);
            font-weight: 800; line-height: 1.08; letter-spacing: -0.04em;
            color: var(--ink); margin-bottom: 20px;
        }
        .hero h1 .italic-serif { font-family: 'Plus Jakarta Sans', sans-serif; font-style: italic; color: var(--brand); font-weight: 700; }
        .hero h1 .highlight {
            position: relative; display: inline-block;
        }
        .hero h1 .highlight::after {
            content: '';
            position: absolute; bottom: 4px; left: 0; right: 0; height: 6px;
            background: linear-gradient(90deg, var(--brand-light), var(--brand-border));
            border-radius: 4px; z-index: -1;
        }

        .hero-sub { font-size: 17px; color: var(--muted); max-width: 560px; margin: 0 auto 38px; line-height: 1.75; font-weight: 400; }

        /* Billing toggle */
        .billing-pill-wrap { display: flex; align-items: center; justify-content: center; gap: 14px; margin-bottom: 48px; }
        .billing-pill {
            display: inline-flex; background: var(--card);
            border: 1.5px solid var(--border); border-radius: 100px;
            padding: 5px; gap: 4px;
            box-shadow: 0 2px 12px rgba(13,21,38,0.07), inset 0 1px 0 rgba(255,255,255,0.9);
        }
        .pill-btn {
            padding: 9px 26px; border-radius: 100px;
            font-size: 13.5px; font-weight: 700; font-family: inherit;
            cursor: pointer; transition: all 0.22s; border: none;
            background: transparent; color: var(--muted); letter-spacing: -0.01em;
        }
        .pill-btn.active {
            background: var(--ink); color: #fff;
            box-shadow: 0 2px 12px rgba(13,21,38,0.2);
        }

        .save-tag {
            display: inline-flex; align-items: center; gap: 5px;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border: 1.5px solid #a7f3d0; color: #065f46;
            font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: 100px;
            letter-spacing: 0.02em;
        }

        /* Social proof trust bar */
        .trust-bar { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 24px; }
        .trust-item { display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 600; color: var(--muted); }
        .trust-item .ico { color: var(--green); display: flex; }
        .trust-sep { width: 4px; height: 4px; border-radius: 50%; background: var(--border-2); }

        /* ══════════════════════════════════════
           STATS ROW
        ══════════════════════════════════════ */
        .stats-row {
            background: var(--card); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
        }
        .stats-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 28px;
            display: grid; grid-template-columns: repeat(4, 1fr);
        }
        @media (max-width: 768px) { .stats-inner { grid-template-columns: repeat(2, 1fr); } }

        .stat-block {
            padding: 28px 20px; text-align: center;
            border-right: 1px solid var(--border); position: relative;
        }
        .stat-block:last-child { border-right: none; }
        .stat-num {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 32px; font-weight: 800; color: var(--ink); letter-spacing: -0.04em; line-height: 1;
        }
        .stat-num .unit { color: var(--brand); }
        .stat-label { font-size: 12.5px; color: var(--muted); margin-top: 5px; font-weight: 500; }

        /* ══════════════════════════════════════
           SECTION WRAPPER
        ══════════════════════════════════════ */
        .section-wrap { max-width: 1280px; margin: 0 auto; padding: 0 28px; }
<<<<<<< HEAD
        .section-header { text-align: center; margin-bottom: 52px; }
        .section-tag {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 14px; border-radius: 100px;
            background: var(--brand-light); border: 1.5px solid var(--brand-border);
            font-size: 11.5px; font-weight: 800; color: var(--brand);
            letter-spacing: 0.07em; text-transform: uppercase; margin-bottom: 14px;
        }
        .section-title {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(1.8rem, 3.5vw, 2.6rem); font-weight: 800;
            color: var(--ink); letter-spacing: -0.04em; margin-bottom: 12px; line-height: 1.15;
        }
        .section-sub { font-size: 16px; color: var(--muted); max-width: 500px; margin: 0 auto; line-height: 1.7; }
=======
        .section-header { text-align: center; margin-bottom: 36px; } /* Reduced from 52px */
        .section-tag {
            display: inline-flex; align-items: center; gap: 4px; /* Reduced gap */
            padding: 3px 10px; border-radius: 80px; /* Reduced padding */
            background: var(--brand-light); border: 1px solid var(--brand-border); /* Reduced border */
            font-size: 9px; font-weight: 800; color: var(--brand); /* Reduced font size */
            letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 8px; /* Reduced margin */
        }
        .section-title {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(1.5rem, 3vw, 2.2rem); font-weight: 800; /* Reduced font size */
            color: var(--ink); letter-spacing: -0.03em; margin-bottom: 8px; line-height: 1.2; /* Reduced margin */
        }
        .section-sub { font-size: 14px; color: var(--muted); max-width: 500px; margin: 0 auto; line-height: 1.6; } /* Reduced font size */
>>>>>>> c57bb21 (subscription module)

        /* ══════════════════════════════════════
           PLAN CARDS
        ══════════════════════════════════════ */
<<<<<<< HEAD
        #plans-section { padding: 80px 0; }

        .plans-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
            align-items: start;
        }
        @media (max-width: 1100px) { .plans-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; } }
        @media (min-width: 640px) and (max-width: 1099px) { .plans-grid { grid-template-columns: repeat(2, 1fr); max-width: 800px; margin: 0 auto; } }
=======
         #plans-section { padding: 80px 0; }

        /* CUSTOM: Fixed size plan cards (300px x 500px) */
        .plan-card {
            width: 300px !important;
            height: 500px !important;
            padding: 24px 22px !important;
            display: flex;
            flex-direction: column;
            overflow: visible !important;
        }
        .plan-card:hover {
            transform: translateY(-4px);
        }
        .plan-name {
            font-size: 22px !important;
            margin-bottom: 3px;
        }
        .plan-tagline {
            font-size: 13px !important;
            margin-bottom: 12px !important;
            line-height: 1.4;
        }
        .price-main {
            font-size: 42px !important;
        }
        .price-main .currency {
            font-size: 20px !important;
        }
        .price-cycle {
            font-size: 12px !important;
            margin-bottom: 0;
        }
        .trial-badge {
            font-size: 11px !important;
            padding: 3px 9px !important;
            margin-bottom: 12px !important;
        }
        .chip-grid {
            gap: 6px !important;
            margin-bottom: 10px !important;
        }
        .chip-card {
            padding: 8px 10px !important;
        }
        .chip-val {
            font-size: 18px !important;
        }
        .chip-label {
            font-size: 9px !important;
        }
        .feat-list {
            gap: 6px !important;
            flex: 1 1 auto !important;
            min-height: 0 !important;
            overflow-y: auto !important;
            scrollbar-width: thin;
            margin-bottom: 0 !important;
            padding-right: 2px;
        }
        .feat-list::-webkit-scrollbar {
            width: 3px;
        }
        .feat-list::-webkit-scrollbar-thumb {
            background: var(--border-2);
            border-radius: 4px;
        }
        .feat-row {
            font-size: 12.5px !important;
            gap: 7px !important;
        }
        .feat-ico {
            width: 18px !important;
            height: 18px !important;
            flex-shrink: 0;
        }
        .plan-divider {
            margin: 10px 0 !important;
            border-top-width: 1px !important;
        }
        .btn-plan {
            padding: 12px !important;
            font-size: 13px !important;
            margin-top: auto;
        }
        .btn-sub-note {
            font-size: 11px !important;
            margin-top: 6px;
        }
        .plan-icon {
            width: 48px !important;
            height: 48px !important;
            border-radius: 12px !important;
            margin-bottom: 10px !important;
        }
        .plan-icon i {
            font-size: 22px !important;
        }
        .popular-badge {
            font-size: 10px !important;
            padding: 4px 14px 6px !important;
        }

        .plans-grid {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 24px;
            flex-wrap: wrap;
        }
        @media (max-width: 1100px) { .plans-grid { flex-direction: column; align-items: center; } }
>>>>>>> c57bb21 (subscription module)

        .plan-card {
            background: var(--card); border: 1.5px solid var(--border);
            border-radius: 22px; padding: 30px 26px;
            display: flex; flex-direction: column;
            position: relative; overflow: hidden;
            transition: transform 0.3s cubic-bezier(.22,.68,0,1.2), box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .plan-card::before {
            content: ''; position: absolute; inset: 0; border-radius: 22px;
            background: linear-gradient(170deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0) 60%);
            pointer-events: none;
        }
        .plan-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 60px rgba(13,21,38,0.10), 0 4px 16px rgba(13,21,38,0.06);
            border-color: var(--border-2);
        }

        /* FEATURED */
        .plan-card.is-pro {
            border: 2px solid var(--brand);
            background: linear-gradient(160deg, #f0f6ff 0%, #ffffff 50%);
            box-shadow: 0 8px 40px rgba(26,86,219,0.12), 0 0 0 4px rgba(26,86,219,0.06);
        }
        .plan-card.is-pro:hover {
            box-shadow: 0 28px 64px rgba(26,86,219,0.18), 0 0 0 4px rgba(26,86,219,0.08);
            transform: translateY(-10px);
        }

        /* ENTERPRISE */
        .plan-card.is-ent {
            border: 1.5px solid var(--amber-border);
            background: linear-gradient(160deg, #fffcf0 0%, #ffffff 50%);
        }
        .plan-card.is-ent:hover {
            border-color: var(--amber); box-shadow: 0 24px 60px rgba(217,119,6,0.09);
        }

        /* Popular tag */
        .popular-badge {
            position: absolute; top: 0; left: 50%; transform: translateX(-50%);
            background: var(--brand); color: #fff;
            font-size: 11px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;
            padding: 5px 18px 8px; border-radius: 0 0 14px 14px;
            display: flex; align-items: center; gap: 5px; white-space: nowrap;
        }

        /* Plan icon */
        .plan-icon {
            width: 50px; height: 50px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 18px; flex-shrink: 0;
        }

        .plan-name {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 21px; font-weight: 800; letter-spacing: -0.03em;
            color: var(--ink); margin-bottom: 5px;
        }
        .plan-tagline { font-size: 13px; color: var(--muted); line-height: 1.55; margin-bottom: 24px; }

        /* Price */
        .price-block { margin-bottom: 8px; }
        .price-main {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 46px; font-weight: 800; letter-spacing: -0.05em;
            color: var(--ink); line-height: 1; display: flex; align-items: flex-start; gap: 2px;
        }
        .price-main .currency { font-size: 22px; font-weight: 700; margin-top: 8px; color: var(--muted); }
        .price-main .crossed { text-decoration: line-through; font-size: 20px; color: var(--muted-2); margin-left: 10px; margin-top: 14px; font-weight: 500; }
        .price-cycle { font-size: 13px; color: var(--muted); margin-bottom: 6px; font-weight: 500; }

        /* Trial badge */
        .trial-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: var(--green-light); border: 1.5px solid rgba(5,150,105,0.2);
            color: var(--green); font-size: 11.5px; font-weight: 700;
            padding: 4px 11px; border-radius: 100px; margin-bottom: 20px;
        }

        .plan-divider { border: none; border-top: 1px solid var(--border); margin: 20px 0; }

        /* Stat chips */
        .chip-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-bottom: 22px; }
        .chip-card {
            background: var(--surface); border: 1.5px solid var(--border);
            border-radius: 12px; padding: 10px 12px; text-align: center;
            transition: border-color 0.2s;
        }
        .plan-card.is-pro .chip-card { background: rgba(26,86,219,0.05); border-color: var(--brand-border); }
        .plan-card.is-ent .chip-card { background: rgba(217,119,6,0.04); border-color: var(--amber-border); }
        .chip-val {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 20px; font-weight: 800; color: var(--ink); letter-spacing: -0.03em; line-height: 1;
        }
        .is-pro .chip-val { color: var(--brand); }
        .is-ent .chip-val { color: var(--amber); }
        .chip-label { font-size: 10.5px; color: var(--muted); margin-top: 3px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }

        /* Feature list */
        .feat-list { display: flex; flex-direction: column; gap: 9px; }
        .feat-row { display: flex; align-items: flex-start; gap: 9px; font-size: 13.5px; color: var(--ink-2); font-weight: 500; }
        .feat-ico {
            width: 19px; height: 19px; border-radius: 100%; flex-shrink: 0; margin-top: 1px;
            display: flex; align-items: center; justify-content: center;
        }
        .fi-blue  { background: rgba(26,86,219,0.1); color: var(--brand); }
        .fi-amber { background: rgba(217,119,6,0.1);  color: var(--amber); }
        .fi-off   { background: var(--surface); color: var(--muted-2); }
        .feat-row.off { color: var(--muted-2); }

        /* CTA buttons */
        .btn-plan {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%; padding: 14px; border-radius: 12px;
            font-family: inherit; font-size: 14px; font-weight: 700;
            cursor: pointer; transition: all 0.22s; border: none; margin-top: auto; letter-spacing: -0.01em;
        }
        .btn-plan-primary {
            background: var(--ink); color: #fff;
        }
        .btn-plan-primary:hover { background: var(--brand); box-shadow: 0 8px 24px rgba(26,86,219,0.3); transform: translateY(-1px); }

        .btn-plan-outline {
            background: transparent; color: var(--ink-2);
            border: 1.5px solid var(--border-2);
        }
        .btn-plan-outline:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }

        .btn-plan-amber {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: #fff;
        }
        .btn-plan-amber:hover { opacity: 0.92; box-shadow: 0 8px 24px rgba(217,119,6,0.3); transform: translateY(-1px); }

        .btn-sub-note { font-size: 11.5px; color: var(--muted-2); text-align: center; margin-top: 10px; font-weight: 500; }

        /* ══════════════════════════════════════
           FEATURE HIGHLIGHTS
        ══════════════════════════════════════ */
<<<<<<< HEAD
        #features-section { padding: 0 0 80px; }
=======
        #features-section { padding: 0 0 0px; }
>>>>>>> c57bb21 (subscription module)

        .feat-highlights-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;
        }
        @media (max-width: 900px)  { .feat-highlights-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 560px)  { .feat-highlights-grid { grid-template-columns: 1fr; } }

        .fh-card {
            background: var(--card); border: 1.5px solid var(--border);
            border-radius: 18px; padding: 24px;
            transition: all 0.25s cubic-bezier(.22,.68,0,1.2);
            position: relative; overflow: hidden;
        }
        .fh-card::before {
            content: ''; position: absolute; inset: 0; opacity: 0; border-radius: 18px;
            background: radial-gradient(ellipse at top left, rgba(26,86,219,0.04) 0%, transparent 60%);
            transition: opacity 0.3s;
        }
        .fh-card:hover { transform: translateY(-5px); border-color: var(--brand-border); box-shadow: 0 14px 36px rgba(13,21,38,0.08); }
        .fh-card:hover::before { opacity: 1; }

        .fh-icon {
            width: 46px; height: 46px; border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 16px;
        }
        .fh-card h3 { font-family: 'Bricolage Grotesque', sans-serif; font-size: 16px; font-weight: 800; color: var(--ink); margin-bottom: 7px; letter-spacing: -0.02em; }
        .fh-card p  { font-size: 13px; color: var(--muted); line-height: 1.65; }

        /* ══════════════════════════════════════
           COMPARISON TABLE
        ══════════════════════════════════════ */
        #compare-section { padding: 0 0 80px; }

        .compare-outer {
            background: var(--card); border: 1.5px solid var(--border);
            border-radius: 22px; overflow: hidden; overflow-x: auto;
        }
        .compare-tbl { width: 100%; border-collapse: collapse; min-width: 640px; }

        .compare-tbl thead tr th {
            padding: 16px 22px; font-size: 13px; font-weight: 700; text-align: center;
            background: var(--surface); border-bottom: 1.5px solid var(--border); color: var(--muted);
            font-family: 'Bricolage Grotesque', sans-serif; letter-spacing: -0.01em;
        }
        .compare-tbl thead th:first-child { text-align: left; }
        .compare-tbl thead th.col-pro { background: var(--brand-light); color: var(--brand); }

        .compare-tbl tbody tr td {
            padding: 12px 22px; font-size: 13px; font-weight: 500;
            color: var(--ink-2); border-bottom: 1px solid var(--border); text-align: center;
            transition: background 0.15s;
        }
        .compare-tbl tbody tr:last-child td { border-bottom: none; }
        .compare-tbl tbody tr:hover td { background: var(--surface); }
        .compare-tbl tbody tr td:first-child { text-align: left; color: var(--muted); font-weight: 600; }
        .compare-tbl tbody td.col-pro { background: rgba(239,246,255,0.6); }
        .compare-tbl tbody tr:hover td.col-pro { background: rgba(219,234,254,0.7); }

        .tck { display: inline-flex; align-items: center; justify-content: center; color: var(--brand); }
        .tck-gold { display: inline-flex; align-items: center; justify-content: center; color: var(--amber); }
        .tno { display: inline-flex; align-items: center; justify-content: center; color: var(--border-2); }

        /* ══════════════════════════════════════
           FAQ
        ══════════════════════════════════════ */
        #faq-section { padding: 0 0 80px; }

        .faq-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
        @media (max-width: 768px) { .faq-grid { grid-template-columns: 1fr; } }

        .faq-card {
            background: var(--card); border: 1.5px solid var(--border);
            border-radius: 16px; overflow: hidden; transition: border-color 0.2s;
        }
        .faq-card:hover { border-color: var(--brand-border); }

        details > summary {
            list-style: none; padding: 18px 22px;
            font-size: 14.5px; font-weight: 700; color: var(--ink);
            cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: 12px;
            transition: color 0.15s; letter-spacing: -0.02em;
        }
        details > summary::-webkit-details-marker { display: none; }
        details[open] > summary { color: var(--brand); border-bottom: 1px solid var(--border); }
        .faq-toggle { color: var(--muted-2); transition: transform 0.25s ease, color 0.15s; flex-shrink: 0; }
        details[open] .faq-toggle { transform: rotate(45deg); color: var(--brand); }
        .faq-body { padding: 16px 22px; font-size: 13.5px; color: var(--muted); line-height: 1.75; }

        /* ══════════════════════════════════════
           CTA SECTION
        ══════════════════════════════════════ */
        .cta-section { padding: 0 28px 80px; max-width: 1280px; margin: 0 auto; }
        .cta-inner {
            background: var(--ink);
            border-radius: 26px; padding: 64px 48px;
            text-align: center; position: relative; overflow: hidden;
        }
        .cta-inner::before {
            content: ''; position: absolute; inset: 0;
            background:
                radial-gradient(ellipse 60% 70% at 20% 50%, rgba(26,86,219,0.35) 0%, transparent 60%),
                radial-gradient(ellipse 50% 50% at 85% 30%, rgba(8,145,178,0.2) 0%, transparent 55%);
            pointer-events: none;
        }
        .cta-inner h2 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(1.7rem, 3.5vw, 2.6rem); font-weight: 800;
            color: #fff; letter-spacing: -0.04em; margin-bottom: 14px; line-height: 1.15;
            position: relative; z-index: 1;
        }
        .cta-inner p { font-size: 16px; color: rgba(255,255,255,0.6); margin-bottom: 36px; position: relative; z-index: 1; }
        .cta-buttons { display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; position: relative; z-index: 1; }
        .cta-btn-white {
            padding: 14px 32px; border-radius: 12px; background: #fff; color: var(--ink);
            font-family: inherit; font-size: 14.5px; font-weight: 800; border: none; cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.2s; letter-spacing: -0.01em;
        }
        .cta-btn-white:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(0,0,0,0.3); }
        .cta-btn-ghost {
            padding: 13px 30px; border-radius: 12px; background: rgba(255,255,255,0.1);
            border: 1.5px solid rgba(255,255,255,0.25); color: rgba(255,255,255,0.85);
            font-family: inherit; font-size: 14.5px; font-weight: 700; cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.2s; letter-spacing: -0.01em;
        }
        .cta-btn-ghost:hover { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.5); }

        /* ══════════════════════════════════════
           FOOTER
        ══════════════════════════════════════ */
        .site-footer { background: #0c1421; color: rgba(255,255,255,0.55); }

        .footer-main {
            max-width: 1280px; margin: 0 auto; padding: 60px 28px 50px;
            display: grid; grid-template-columns: 2.2fr 1fr 1fr 1fr; gap: 48px;
        }
        @media (max-width: 1024px) { .footer-main { grid-template-columns: 1fr 1fr; gap: 36px; } }
        @media (max-width: 560px)  { .footer-main { grid-template-columns: 1fr; } }

        .footer-brand-desc { font-size: 13px; color: rgba(255,255,255,0.4); line-height: 1.75; margin: 14px 0 22px; max-width: 280px; }
        .footer-logo-text { font-family: 'Bricolage Grotesque', sans-serif; font-size: 20px; font-weight: 800; color: #fff; letter-spacing: -0.04em; }
        .footer-logo-mark { width: 36px; height: 36px; border-radius: 10px; background: var(--brand); display: flex; align-items: center; justify-content: center; }

        .social-icons { display: flex; gap: 10px; }
        .social-btn {
            width: 36px; height: 36px; border-radius: 9px;
            background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.45); cursor: pointer; transition: all 0.2s;
        }
        .social-btn:hover { background: var(--brand); border-color: var(--brand); color: #fff; }

        .footer-col h5 { font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.9); margin-bottom: 18px; letter-spacing: -0.01em; font-family: 'Bricolage Grotesque', sans-serif; }
        .footer-link { display: flex; align-items: center; gap: 6px; font-size: 13px; color: rgba(255,255,255,0.4); text-decoration: none; margin-bottom: 11px; transition: color 0.15s; font-weight: 500; }
        .footer-link:hover { color: rgba(255,255,255,0.85); }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.07);
            max-width: 1280px; margin: 0 auto; padding: 22px 28px;
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
        }
        .footer-copyright { font-size: 12.5px; color: rgba(255,255,255,0.3); font-weight: 500; }
        .footer-status { display: flex; align-items: center; gap: 7px; font-size: 12.5px; color: rgba(255,255,255,0.35); }
        .status-green { width: 7px; height: 7px; border-radius: 50%; background: var(--green); box-shadow: 0 0 6px rgba(5,150,105,0.6); }

        /* ══════════════════════════════════════
           ANIMATIONS
        ══════════════════════════════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fu  { animation: fadeUp 0.6s cubic-bezier(.22,.68,0,1) both; }
        .d0  { animation-delay: 0s; }
        .d1  { animation-delay: 0.10s; }
        .d2  { animation-delay: 0.20s; }
        .d3  { animation-delay: 0.30s; }
        .d4  { animation-delay: 0.40s; }
        .d5  { animation-delay: 0.50s; }

        /* ══════════════════════════════════════
           UTILITIES
        ══════════════════════════════════════ */
        @media (max-width: 768px) {
            .hero { padding: 72px 20px 64px; }
            .stat-num { font-size: 26px; }
            .cta-inner { padding: 44px 24px; }
            .billing-pill-wrap { flex-wrap: wrap; }
        }
    </style>
</head>
<body>

<<<<<<< HEAD
<!-- ════════════════════════════════════════════
     ANNOUNCEMENT RIBBON
════════════════════════════════════════════ -->
<div id="announce-bar">
    <span class="tag">🎉 Offer</span>
    Get 2 months free on all yearly plans — Limited time.
    <a href="#plans-section">Claim now →</a>
    <button id="close-bar" onclick="document.getElementById('announce-bar').remove()" aria-label="Close">
        <i data-lucide="x" style="width:16px;height:16px;"></i>
    </button>
</div>
=======
@include('website.partials.navbar')

@yield('content')

@include('website.partials.footer')

<!-- ════════════════════════════════════════════
     ANNOUNCEMENT RIBBON
════════════════════════════════════════════ -->

>>>>>>> c57bb21 (subscription module)

<!-- ════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════ -->
<<<<<<< HEAD
<header class="navbar" id="main-nav">
    <div class="nav-inner">

        <!-- Logo -->
        <a href="#" class="logo-wrap">
            <div class="logo-mark">
                <i data-lucide="building-2" style="width:19px;height:19px;color:white;position:relative;z-index:1;"></i>
            </div>
            <span class="logo-text">Prop<em>Nest</em></span>
        </a>

        <!-- Center links -->
        <nav class="nav-center" id="desktopNav">
            <a href="#" class="nav-link active">Home</a>
            <a href="#plans-section" class="nav-link">Pricing</a>
            <a href="#features-section" class="nav-link">Features</a>
            <a href="#compare-section" class="nav-link">Compare</a>
            <a href="#faq-section" class="nav-link">
                FAQ
            </a>
            <a href="#" class="nav-link">
                Blog
                <span class="nav-badge-new">New</span>
            </a>
        </nav>

        <!-- Right actions -->
        <div class="nav-right">
            <button class="btn-login">Log in</button>
            <button class="btn-signup">
                Get started
                <i data-lucide="arrow-right" class="arrow" style="width:15px;height:15px;"></i>
            </button>
        </div>

        <!-- Hamburger -->
        <button class="hamburger" id="ham-btn" onclick="toggleMobileNav()" aria-label="Open menu">
            <i data-lucide="menu" id="ham-icon" style="width:20px;height:20px;"></i>
        </button>

    </div>
</header>

<!-- Mobile Nav -->
<div class="mobile-nav" id="mobileNav">
    <a href="#" class="nav-link active" onclick="closeMobileNav()">Home</a>
    <a href="#plans-section" class="nav-link" onclick="closeMobileNav()">Pricing</a>
    <a href="#features-section" class="nav-link" onclick="closeMobileNav()">Features</a>
    <a href="#compare-section" class="nav-link" onclick="closeMobileNav()">Compare</a>
    <a href="#faq-section" class="nav-link" onclick="closeMobileNav()">FAQ</a>
    <a href="#" class="nav-link" onclick="closeMobileNav()">Blog</a>
    <div class="mobile-nav-actions">
        <button class="btn-login" style="width:100%;padding:13px;font-size:14px;">Log in</button>
        <button class="btn-signup" style="width:100%;padding:14px;font-size:14px;justify-content:center;">Get started <i data-lucide="arrow-right" style="width:15px;height:15px;"></i></button>
    </div>
</div>
=======

<!-- Mobile Nav -->
>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ -->
<<<<<<< HEAD
<section class="hero">
    <div class="fu d0">
        <div class="hero-eyebrow">
            <span class="pulse"></span>
            Property Management Platform · Bangladesh
        </div>
    </div>

    <h1 class="fu d1">
        One platform for every<br>
        <span class="highlight"><span class="italic-serif">property manager</span></span>
    </h1>

    <p class="hero-sub fu d2">
        Collect rent, manage tenants & track your portfolio — all in one place.
        Plans priced in BDT for Bangladeshi landlords &amp; agencies.
    </p>

    <!-- Billing toggle -->
    <div class="billing-pill-wrap fu d3">
        <div class="billing-pill">
            <button class="pill-btn active" id="btn-monthly" onclick="setBilling('monthly')">Monthly</button>
            <button class="pill-btn" id="btn-yearly" onclick="setBilling('yearly')">Yearly</button>
        </div>
        <span class="save-tag">
      <i data-lucide="sparkles" style="width:13px;height:13px;"></i>
      Save 20%
    </span>
    </div>

    <!-- Trust bar -->
    <div class="trust-bar fu d4">
    <span class="trust-item">
      <span class="ico"><i data-lucide="shield-check" style="width:16px;height:16px;"></i></span>
      No credit card required
    </span>
        <span class="trust-sep"></span>
        <span class="trust-item">
      <span class="ico"><i data-lucide="refresh-ccw" style="width:16px;height:16px;"></i></span>
      Cancel anytime
    </span>
        <span class="trust-sep"></span>
        <span class="trust-item">
      <span class="ico"><i data-lucide="headphones" style="width:16px;height:16px;"></i></span>
      24/7 support
    </span>
        <span class="trust-sep"></span>
        <span class="trust-item">
      <span class="ico"><i data-lucide="banknote" style="width:16px;height:16px;"></i></span>
      BDT pricing
    </span>
    </div>
</section>
=======

>>>>>>> c57bb21 (subscription module)

<!-- ════════════════════════════════════════════
     STATS ROW
════════════════════════════════════════════ -->
<<<<<<< HEAD
<div class="stats-row">
    <div class="stats-inner">
        <div class="stat-block">
            <div class="stat-num">12<span class="unit">K+</span></div>
            <div class="stat-label">Properties managed</div>
        </div>
        <div class="stat-block">
            <div class="stat-num">98<span class="unit">%</span></div>
            <div class="stat-label">Customer satisfaction</div>
        </div>
        <div class="stat-block">
            <div class="stat-num">৳<span class="unit">0</span></div>
            <div class="stat-label">Setup cost</div>
        </div>
        <div class="stat-block">
            <div class="stat-num">3<span class="unit">min</span></div>
            <div class="stat-label">Avg. onboarding time</div>
        </div>
    </div>
</div>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     PLANS
════════════════════════════════════════════ -->
<<<<<<< HEAD
<section id="plans-section" style="padding: 88px 0 80px;">
    <div class="section-wrap">
        <div class="section-header">
            <div class="section-tag"><i data-lucide="layers" style="width:12px;height:12px;"></i> Plans &amp; Pricing</div>
            <h2 class="section-title">Find your perfect plan</h2>
            <p class="section-sub">Start free, scale when you're ready. No surprises — transparent BDT pricing.</p>
        </div>

        <div class="plans-grid">

            <!-- ── BASIC ── -->
            <div class="plan-card fu d1">
                <div class="plan-icon" style="background:#f1f5f9; color:#475569;">
                    <i data-lucide="home" style="width:24px;height:24px;"></i>
                </div>
                <div class="plan-name">Basic</div>
                <div class="plan-tagline">For individual landlords getting started with property management.</div>

                <div class="price-block">
                    <div class="price-main">
                        <span class="currency">৳</span>
                        <span class="pm-price">999</span>
                    </div>
                </div>
                <div class="price-cycle">per month · billed <span class="cycle-word">monthly</span></div>
                <div class="trial-badge">
                    <i data-lucide="gift" style="width:12px;height:12px;"></i>
                    7-day free trial
                </div>

                <div class="chip-grid">
                    <div class="chip-card"><div class="chip-val">5</div><div class="chip-label">Properties</div></div>
                    <div class="chip-card"><div class="chip-val">20</div><div class="chip-label">Tenants</div></div>
                    <div class="chip-card"><div class="chip-val">3</div><div class="chip-label">Users</div></div>
                    <div class="chip-card"><div class="chip-val">1GB</div><div class="chip-label">Storage</div></div>
                </div>

                <hr class="plan-divider">
                <div class="feat-list">
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Rent collection &amp; invoicing</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Tenant portal access</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Basic maintenance requests</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Email notifications</div>
                    <div class="feat-row off"><div class="feat-ico fi-off"><i data-lucide="minus" style="width:11px;height:11px;stroke-width:3;"></i></div>Advanced analytics</div>
                    <div class="feat-row off"><div class="feat-ico fi-off"><i data-lucide="minus" style="width:11px;height:11px;stroke-width:3;"></i></div>API access</div>
                </div>
                <hr class="plan-divider">
                <button class="btn-plan btn-plan-outline">
                    <i data-lucide="play-circle" style="width:16px;height:16px;"></i>
                    Start free trial
                </button>
                <div class="btn-sub-note">No credit card needed · Cancel anytime</div>
            </div>

            <!-- ── PRO (featured) ── -->
            <div class="plan-card is-pro fu d2">
                <div class="popular-badge">
                    <i data-lucide="star" style="width:11px;height:11px;fill:white;"></i>
                    Most Popular
                </div>

                <div class="plan-icon" style="background:#eff6ff; color:#1a56db; margin-top:18px;">
                    <i data-lucide="building-2" style="width:24px;height:24px;"></i>
                </div>
                <div class="plan-name" style="color:#1447b7;">Pro</div>
                <div class="plan-tagline">For growing property managers who need more power and control.</div>

                <div class="price-block">
                    <div class="price-main" style="color:#1447b7;">
                        <span class="currency" style="color:#5a8adc;">৳</span>
                        <span class="pm-price">2,499</span>
                        <span class="crossed pm-crossed" style="display:none;">৳3,124</span>
                    </div>
                </div>
                <div class="price-cycle">per month · billed <span class="cycle-word">monthly</span></div>
                <div class="trial-badge">
                    <i data-lucide="gift" style="width:12px;height:12px;"></i>
                    14-day free trial
                </div>

                <div class="chip-grid">
                    <div class="chip-card"><div class="chip-val">25</div><div class="chip-label">Properties</div></div>
                    <div class="chip-card"><div class="chip-val">100</div><div class="chip-label">Tenants</div></div>
                    <div class="chip-card"><div class="chip-val">10</div><div class="chip-label">Users</div></div>
                    <div class="chip-card"><div class="chip-val">10GB</div><div class="chip-label">Storage</div></div>
                </div>

                <hr class="plan-divider" style="border-color: rgba(26,86,219,0.12);">
                <div class="feat-list">
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Everything in Basic</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Advanced analytics &amp; reports</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Automated rent reminders</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Document management</div>
                    <div class="feat-row"><div class="feat-ico fi-blue"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Priority email support</div>
                    <div class="feat-row off"><div class="feat-ico fi-off"><i data-lucide="minus" style="width:11px;height:11px;stroke-width:3;"></i></div>Dedicated account manager</div>
                </div>
                <hr class="plan-divider" style="border-color: rgba(26,86,219,0.12);">
                <button class="btn-plan btn-plan-primary">
                    <i data-lucide="zap" style="width:16px;height:16px;"></i>
                    Get started — Pro
                </button>
                <div class="btn-sub-note">14-day free trial included</div>
            </div>

            <!-- ── ENTERPRISE ── -->
            <div class="plan-card is-ent fu d3">
                <div class="plan-icon" style="background:#fffbeb; color:#d97706;">
                    <i data-lucide="landmark" style="width:24px;height:24px;"></i>
                </div>
                <div class="plan-name" style="color:#92400e;">Enterprise</div>
                <div class="plan-tagline">For large agencies with custom requirements, scale &amp; compliance needs.</div>

                <div class="price-block">
                    <div class="price-main" style="color:#92400e;">
                        <span class="currency" style="color:#c4881a;">৳</span>
                        <span class="pm-price">6,999</span>
                    </div>
                </div>
                <div class="price-cycle">per month · billed <span class="cycle-word">monthly</span></div>
                <div class="trial-badge" style="background:#fef9c3; border-color:rgba(217,119,6,0.25); color:#92400e;">
                    <i data-lucide="gift" style="width:12px;height:12px;"></i>
                    30-day free trial
                </div>

                <div class="chip-grid">
                    <div class="chip-card"><div class="chip-val">∞</div><div class="chip-label">Properties</div></div>
                    <div class="chip-card"><div class="chip-val">∞</div><div class="chip-label">Tenants</div></div>
                    <div class="chip-card"><div class="chip-val">∞</div><div class="chip-label">Users</div></div>
                    <div class="chip-card"><div class="chip-val">100GB</div><div class="chip-label">Storage</div></div>
                </div>

                <hr class="plan-divider" style="border-color: rgba(217,119,6,0.15);">
                <div class="feat-list">
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Everything in Pro</div>
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Dedicated account manager</div>
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Custom API &amp; integrations</div>
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>White-label branding</div>
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>SLA &amp; 24/7 priority support</div>
                    <div class="feat-row"><div class="feat-ico fi-amber"><i data-lucide="check" style="width:11px;height:11px;stroke-width:3;"></i></div>Custom data retention</div>
                </div>
                <hr class="plan-divider" style="border-color: rgba(217,119,6,0.15);">
                <button class="btn-plan btn-plan-amber">
                    <i data-lucide="phone-call" style="width:16px;height:16px;"></i>
                    Contact sales
                </button>
                <div class="btn-sub-note">Custom pricing available · 30-day trial</div>
            </div>

        </div><!-- /plans-grid -->
    </div>
</section>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     FEATURE HIGHLIGHTS
════════════════════════════════════════════ -->
<<<<<<< HEAD
<section id="features-section">
    <div class="section-wrap" style="padding-bottom: 80px;">
        <div class="section-header">
            <div class="section-tag"><i data-lucide="cpu" style="width:12px;height:12px;"></i> Platform Features</div>
            <h2 class="section-title">Built for real property managers</h2>
            <p class="section-sub">From rent day chaos to one clean dashboard — PropNest handles everything.</p>
        </div>

        <div class="feat-highlights-grid">
            <div class="fh-card fu d0">
                <div class="fh-icon" style="background:#eff6ff; color:#1a56db;"><i data-lucide="home" style="width:22px;height:22px;"></i></div>
                <h3>Property Management</h3>
                <p>Add properties, upload documents, monitor occupancy and track portfolio value — all in one dashboard.</p>
            </div>
            <div class="fh-card fu d1">
                <div class="fh-icon" style="background:#ecfdf5; color:#059669;"><i data-lucide="wallet" style="width:22px;height:22px;"></i></div>
                <h3>Smart Rent Collection</h3>
                <p>Automated payment reminders, online collection via bKash/Nagad, instant digital receipts.</p>
            </div>
            <div class="fh-card fu d2">
                <div class="fh-icon" style="background:#fef3c7; color:#d97706;"><i data-lucide="users" style="width:22px;height:22px;"></i></div>
                <h3>Tenant Portal</h3>
                <p>Self-service portal where tenants can pay rent, raise maintenance requests and view all documents.</p>
            </div>
            <div class="fh-card fu d3">
                <div class="fh-icon" style="background:#fdf2f8; color:#be185d;"><i data-lucide="bar-chart-3" style="width:22px;height:22px;"></i></div>
                <h3>Analytics &amp; Reports</h3>
                <p>Income statements, vacancy trends, occupancy rates — export in PDF or Excel with one click.</p>
            </div>
            <div class="fh-card fu d4">
                <div class="fh-icon" style="background:#f0f9ff; color:#0284c7;"><i data-lucide="wrench" style="width:22px;height:22px;"></i></div>
                <h3>Maintenance Tracking</h3>
                <p>Log, assign, and resolve maintenance issues with real-time updates for tenants and managers.</p>
            </div>
            <div class="fh-card fu d5">
                <div class="fh-icon" style="background:#f5f3ff; color:#7c3aed;"><i data-lucide="plug-zap" style="width:22px;height:22px;"></i></div>
                <h3>API &amp; Integrations</h3>
                <p>Connect your accounting tools, payment gateways, and any third-party apps via our REST API.</p>
            </div>
        </div>
    </div>
</section>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     COMPARISON TABLE
════════════════════════════════════════════ -->
<<<<<<< HEAD
<section id="compare-section">
    <div class="section-wrap" style="padding-bottom: 80px;">
        <div class="section-header">
            <div class="section-tag"><i data-lucide="table-2" style="width:12px;height:12px;"></i> Comparison</div>
            <h2 class="section-title">Side-by-side plan comparison</h2>
            <p class="section-sub">Every feature, clearly laid out. No fine print.</p>
        </div>

        <div class="compare-outer">
            <table class="compare-tbl">
                <thead>
                <tr>
                    <th style="width:34%; text-align:left;">Feature</th>
                    <th style="width:22%;">Basic</th>
                    <th class="col-pro" style="width:22%;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                            <i data-lucide="star" style="width:13px;height:13px;fill:var(--brand);color:var(--brand);"></i> Pro
                        </div>
                    </th>
                    <th style="width:22%; color:var(--amber);">Enterprise</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>Max Properties</td><td>5</td><td class="col-pro"><strong>25</strong></td><td style="color:var(--amber);font-weight:700;">Unlimited</td></tr>
                <tr><td>Max Tenants</td><td>20</td><td class="col-pro"><strong>100</strong></td><td style="color:var(--amber);font-weight:700;">Unlimited</td></tr>
                <tr><td>Max Users</td><td>3</td><td class="col-pro"><strong>10</strong></td><td style="color:var(--amber);font-weight:700;">Unlimited</td></tr>
                <tr><td>Free Trial Days</td><td>7 days</td><td class="col-pro"><strong>14 days</strong></td><td style="color:var(--amber);font-weight:700;">30 days</td></tr>
                <tr>
                    <td>Rent Collection</td>
                    <td><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td class="col-pro"><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>Tenant Portal</td>
                    <td><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td class="col-pro"><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr><td>Maintenance Requests</td><td>Basic</td><td class="col-pro"><strong>Advanced</strong></td><td style="color:var(--amber);font-weight:700;">Custom</td></tr>
                <tr>
                    <td>Analytics &amp; Reports</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>Document Management</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tck"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(26,86,219,0.1);"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>API Access</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>White-label Branding</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>Dedicated Account Manager</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                <tr>
                    <td>Priority SLA</td>
                    <td><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td class="col-pro"><div class="tno"><i data-lucide="minus-circle" style="width:18px;height:18px;"></i></div></td>
                    <td><div class="tck-gold"><i data-lucide="check-circle" style="width:18px;height:18px;fill:rgba(217,119,6,0.1);"></i></div></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     FAQ
════════════════════════════════════════════ -->
<<<<<<< HEAD
<section id="faq-section">
    <div class="section-wrap" style="padding-bottom:80px;">
        <div class="section-header">
            <div class="section-tag"><i data-lucide="help-circle" style="width:12px;height:12px;"></i> FAQ</div>
            <h2 class="section-title">Frequently asked questions</h2>
            <p class="section-sub">Not finding your answer? Our team is always here to help.</p>
        </div>

        <div class="faq-grid">
            <div class="faq-card">
                <details>
                    <summary>Can I switch between plans anytime? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">Yes — upgrade or downgrade at any time from your dashboard. Billing is prorated automatically so you never overpay.</div>
                </details>
            </div>
            <div class="faq-card">
                <details>
                    <summary>Is pricing really in BDT? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">Absolutely. All prices are in Bangladeshi Taka (৳). We also support local payment methods — bKash, Nagad, Rocket, and bank transfer.</div>
                </details>
            </div>
            <div class="faq-card">
                <details>
                    <summary>What happens after my free trial? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">Your trial never auto-charges. Once it ends you'll be asked to choose a plan. You keep all your data regardless of what you decide.</div>
                </details>
            </div>
            <div class="faq-card">
                <details>
                    <summary>Do I need a credit card to start? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">No credit card required to start your free trial. Just sign up with an email address — you're up and running in minutes.</div>
                </details>
            </div>
            <div class="faq-card">
                <details>
                    <summary>Can multiple team members use one account? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">Yes. Each plan includes a defined number of user seats with role-based access. Enterprise supports unlimited users with granular permissions.</div>
                </details>
            </div>
            <div class="faq-card">
                <details>
                    <summary>How secure is my data? <i data-lucide="plus" class="faq-toggle" style="width:18px;height:18px;flex-shrink:0;"></i></summary>
                    <div class="faq-body">We use 256-bit TLS encryption, daily encrypted backups, and comply with international data protection standards. Your data is never shared or sold.</div>
                </details>
            </div>
        </div>
    </div>
</section>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     CTA BAND
════════════════════════════════════════════ -->
<<<<<<< HEAD
<div class="cta-section">
    <div class="cta-inner">
        <h2>Ready to manage smarter?</h2>
        <p>Join thousands of Bangladeshi landlords already using PropNest. Start free today.</p>
        <div class="cta-buttons">
            <button class="cta-btn-white">
                <i data-lucide="play-circle" style="width:18px;height:18px;color:var(--brand);"></i>
                Start free trial
            </button>
            <button class="cta-btn-ghost">
                <i data-lucide="phone" style="width:16px;height:16px;"></i>
                Talk to sales
            </button>
        </div>
    </div>
</div>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════ -->
<<<<<<< HEAD
<footer class="site-footer">
    <div class="footer-main">

        <!-- Brand -->
        <div>
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:0;">
                <div class="footer-logo-mark">
                    <i data-lucide="building-2" style="width:18px;height:18px;color:white;"></i>
                </div>
                <span class="footer-logo-text">PropNest</span>
            </div>
            <p class="footer-brand-desc">Bangladesh's most trusted property management platform — helping landlords and agencies manage smarter since 2022.</p>
            <div class="social-icons">
                <div class="social-btn" title="Facebook"><i data-lucide="facebook" style="width:15px;height:15px;"></i></div>
                <div class="social-btn" title="Twitter/X"><i data-lucide="twitter" style="width:15px;height:15px;"></i></div>
                <div class="social-btn" title="LinkedIn"><i data-lucide="linkedin" style="width:15px;height:15px;"></i></div>
                <div class="social-btn" title="YouTube"><i data-lucide="youtube" style="width:15px;height:15px;"></i></div>
            </div>
        </div>

        <!-- Product -->
        <div class="footer-col">
            <h5>Product</h5>
            <a href="#" class="footer-link"><i data-lucide="zap" style="width:13px;height:13px;"></i> Features</a>
            <a href="#plans-section" class="footer-link"><i data-lucide="layers" style="width:13px;height:13px;"></i> Pricing</a>
            <a href="#" class="footer-link"><i data-lucide="git-branch" style="width:13px;height:13px;"></i> Changelog</a>
            <a href="#" class="footer-link"><i data-lucide="map" style="width:13px;height:13px;"></i> Roadmap</a>
            <a href="#" class="footer-link"><i data-lucide="code-2" style="width:13px;height:13px;"></i> API Docs</a>
        </div>

        <!-- Company -->
        <div class="footer-col">
            <h5>Company</h5>
            <a href="#" class="footer-link"><i data-lucide="info" style="width:13px;height:13px;"></i> About us</a>
            <a href="#" class="footer-link"><i data-lucide="newspaper" style="width:13px;height:13px;"></i> Blog</a>
            <a href="#" class="footer-link"><i data-lucide="briefcase" style="width:13px;height:13px;"></i> Careers</a>
            <a href="#" class="footer-link"><i data-lucide="megaphone" style="width:13px;height:13px;"></i> Press kit</a>
            <a href="#" class="footer-link"><i data-lucide="mail" style="width:13px;height:13px;"></i> Contact</a>
        </div>

        <!-- Legal -->
        <div class="footer-col">
            <h5>Legal</h5>
            <a href="#" class="footer-link"><i data-lucide="shield" style="width:13px;height:13px;"></i> Privacy Policy</a>
            <a href="#" class="footer-link"><i data-lucide="file-text" style="width:13px;height:13px;"></i> Terms of Service</a>
            <a href="#" class="footer-link"><i data-lucide="cookie" style="width:13px;height:13px;"></i> Cookie Policy</a>
            <a href="#" class="footer-link"><i data-lucide="refresh-ccw" style="width:13px;height:13px;"></i> Refund Policy</a>
        </div>

    </div>

    <div class="footer-bottom">
        <p class="footer-copyright">© 2025 PropNest Ltd. All rights reserved. Made with ♥ in Bangladesh.</p>
        <div class="footer-status">
            <span class="status-green"></span>
            All systems operational
        </div>
    </div>
</footer>
=======

>>>>>>> c57bb21 (subscription module)


<!-- ════════════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════════════ -->
<script>
    // Init Lucide icons
    lucide.createIcons();

    // Nav scroll elevation
    window.addEventListener('scroll', () => {
        document.getElementById('main-nav').classList.toggle('elevated', window.scrollY > 12);
    });

    // Mobile nav
    let mobileOpen = false;
    function toggleMobileNav() {
        mobileOpen = !mobileOpen;
        document.getElementById('mobileNav').classList.toggle('open', mobileOpen);
        const icon = document.getElementById('ham-icon');
        icon.setAttribute('data-lucide', mobileOpen ? 'x' : 'menu');
        lucide.createIcons();
    }
    function closeMobileNav() {
        mobileOpen = false;
        document.getElementById('mobileNav').classList.remove('open');
        document.getElementById('ham-icon').setAttribute('data-lucide', 'menu');
        lucide.createIcons();
    }

    // Billing toggle
    const prices = {
<<<<<<< HEAD
        monthly: { basic: '999',   pro: '2,499',  ent: '6,999'  },
        yearly:  { basic: '799',   pro: '1,999',  ent: '5,599'  },
=======
        monthly: { basic: '999',   silver: '2,499',  gold: '6,999'  },
        yearly:  { basic: '799',   silver: '1,999',  gold: '5,599'  },
>>>>>>> c57bb21 (subscription module)
    };

    function setBilling(mode) {
        const isYearly = mode === 'yearly';
        document.getElementById('btn-monthly').classList.toggle('active', !isYearly);
        document.getElementById('btn-yearly').classList.toggle('active', isYearly);

        const p = isYearly ? prices.yearly : prices.monthly;
        const allPrices = document.querySelectorAll('.pm-price');
<<<<<<< HEAD
        const vals = [p.basic, p.pro, p.ent];
=======
        const vals = [p.basic, p.silver, p.gold];
>>>>>>> c57bb21 (subscription module)
        allPrices.forEach((el, i) => { if (vals[i]) el.textContent = vals[i]; });

        document.querySelectorAll('.cycle-word').forEach(el => {
            el.textContent = isYearly ? 'yearly' : 'monthly';
        });

        const crossed = document.querySelectorAll('.pm-crossed');
        crossed.forEach(el => { el.style.display = isYearly ? 'inline' : 'none'; });
    }
</script>

</body>
</html>
