@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container kt-portlet pt-0">

        <div id="root">
        </div>
        <br>
        <div class="text-center">
            <br>
            <h1 class="display-4 mb-0">Please tell us how you're feeling during this COVID-19 crisis</h1>
        </div>
        <div class="text-center" style="margin-bottom: 30px; margin-top: 30px;">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
            <!--a href="http://front.crisislogger.care" class="btn-outline-primary btn btn-wide btn-lg">Listen to Others' Thoughts</a-->
        </div>

	<p>This is an incredibly challenging time,
	and the pandemic has transformed our lives in ways we never
	could have imagined.
      	We’re concerned about the health of our loved ones,
	grateful for the medical heroes and essential workers
	in our communities, and trying our best to adapt to this
	new normal. We want to be optimistic,
	but the ongoing stress and uncertainty is
	affecting us all, and it’s hard not to worry about what
	the future holds.</p>

	<p>We are here to listen and learn from your experience.
	We invite you to share your thoughts with us —
	including your fears, frustrations, and hopes —
	as an audio or video recording by clicking the "Share Your Thoughts"
        link above.
<!--
        Explore what others have recorded by clicking the "Listen to Others' Thoughts".
-->
	If you choose to contribute your recording to science,
	it will help us find the best ways to provide support to families.</p>

        <p>The Child Mind Institute and <i>Parents</i> Magazine
	have partnered with
        the National Institute of Mental Health, OpenHumans.org,
        the CRI - Université de Paris,
        and Satrajit Ghosh and Sanu Abraham at MIT
        on this important research project.</p>

    </div>
    <script>!function (e) {
            function r(r) {
                for (var n, l, f = r[0], i = r[1], a = r[2], p = 0, s = []; p < f.length; p++) l = f[p], Object.prototype.hasOwnProperty.call(o, l) && o[l] && s.push(o[l][0]), o[l] = 0;
                for (n in i) Object.prototype.hasOwnProperty.call(i, n) && (e[n] = i[n]);
                for (c && c(r); s.length;) s.shift()();
                return u.push.apply(u, a || []), t()
            }

            function t() {
                for (var e, r = 0; r < u.length; r++) {
                    for (var t = u[r], n = !0, f = 1; f < t.length; f++) {
                        var i = t[f];
                        0 !== o[i] && (n = !1)
                    }
                    n && (u.splice(r--, 1), e = l(l.s = t[0]))
                }
                return e
            }

            var n = {}, o = {1: 0}, u = [];

            function l(r) {
                if (n[r]) return n[r].exports;
                var t = n[r] = {i: r, l: !1, exports: {}};
                return e[r].call(t.exports, t, t.exports, l), t.l = !0, t.exports
            }

            l.m = e, l.c = n, l.d = function (e, r, t) {
                l.o(e, r) || Object.defineProperty(e, r, {enumerable: !0, get: t})
            }, l.r = function (e) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
            }, l.t = function (e, r) {
                if (1 & r && (e = l(e)), 8 & r) return e;
                if (4 & r && "object" == typeof e && e && e.__esModule) return e;
                var t = Object.create(null);
                if (l.r(t), Object.defineProperty(t, "default", {
                    enumerable: !0,
                    value: e
                }), 2 & r && "string" != typeof e) for (var n in e) l.d(t, n, function (r) {
                    return e[r]
                }.bind(null, n));
                return t
            }, l.n = function (e) {
                var r = e && e.__esModule ? function () {
                    return e.default
                } : function () {
                    return e
                };
                return l.d(r, "a", r), r
            }, l.o = function (e, r) {
                return Object.prototype.hasOwnProperty.call(e, r)
            }, l.p = "/";
            var f = this.webpackJsonpworldcloud = this.webpackJsonpworldcloud || [], i = f.push.bind(f);
            f.push = r, f = f.slice();
            for (var a = 0; a < f.length; a++) r(f[a]);
            var c = i;
            t()
        }([])</script>
@endsection
