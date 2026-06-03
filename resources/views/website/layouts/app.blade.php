<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PropNest') — PropNest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons (free, open source, premium quality) -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <!-- Fonts: Bricolage Grotesque (display) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300;12..96,400;12..96,500;12..96,700;12..96,800&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* ══════════════════════════════════════
           PLAN CARDS
        ══════════════════════════════════════ */
        #plans-section { padding: 80px 0; }

        .plans-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
            align-items: start;
        }
        @media (max-width: 1100px) { .plans-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; } }
        @media (min-width: 640px) and (max-width: 1099px) { .plans-grid { grid-template-columns: repeat(2, 1fr); max-width: 800px; margin: 0 auto; } }

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
        #features-section { padding: 0 0 80px; }

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

<!-- ════════════════════════════════════════════
     ANNOUNCEMENT RIBBON
════════════════════════════════════════════ -->
<div id="announce-bar">
    <span class="tag">🎉 Offer</span>
    Get 2 months free on all yearly plans — Limited time.
    <a href="{{ route('plans') }}">Claim now →</a>
    <button id="close-bar" onclick="document.getElementById('announce-bar').remove()" aria-label="Close">
        <i data-lucide="x" style="width:16px;height:16px;"></i>
    </button>
</div>

<!-- ════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════ -->
@include('website.partials.navbar')

<!-- ════════════════════════════════════════════
     MAIN CONTENT
════════════════════════════════════════════ -->
<main>
    @yield('content')
</main>

<!-- ════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════ -->
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
            <a href="{{ route('plans') }}" class="footer-link"><i data-lucide="layers" style="width:13px;height:13px;"></i> Pricing</a>
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
        monthly: { basic: '999',   pro: '2,499',  ent: '6,999'  },
        yearly:  { basic: '799',   pro: '1,999',  ent: '5,599'  },
    };

    function setBilling(mode) {
        const isYearly = mode === 'yearly';
        document.getElementById('btn-monthly').classList.toggle('active', !isYearly);
        document.getElementById('btn-yearly').classList.toggle('active', isYearly);

        const p = isYearly ? prices.yearly : prices.monthly;
        const allPrices = document.querySelectorAll('.pm-price');
        const vals = [p.basic, p.pro, p.ent];
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
