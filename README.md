# Google for Testing - CLI

[![Latest Version on Packagist](https://img.shields.io/packagist/v/asciito/google-for-testing.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/asciito/google-for-testing)
[![Licence on Packagist](https://img.shields.io/packagist/l/asciito/google-for-testing.svg?label=Packagist%20License&style=flat-square)](https://packagist.org/packages/asciito/google-for-testing)
[![Tests](https://img.shields.io/github/actions/workflow/status/asciito/google-for-testing/test.yml?label=Tests&style=flat-square)](https://github.com/asciito/google-for-testing/actions/workflows/test.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/asciito/google-for-testing.svg?label=Downloads&style=flat-square)](https://packagist.org/packages/asciito/google-for-testing)

This is a **personal project**, but the community can also contribute to this project, and is build with [Laravel Zero](https://github.com/laravel-zero/laravel-zero).

---

## The why?

It's simple, because I need a tool to manage my Chrome Driver and Chrome Browser, but... the reason behind that
is that in my work, I need to automate some interaction in a webpage, and because that page doesn't have an API, and doing some manual tasks
is painfully boring... and, trying to spin-up a Chrome Driver server
with the correct Browser Version, is painful (I **HATE** manual tasks), I decided to create this tiny CLI (in commands, not in size) to help me.

**I HATE MANUAL TASKS**

---

## Documentation

* [Commands](#commands)
  * [Install Google Chrome Browser](#install-google-chrome-browser)
  * [Install Google Chrome Driver](#install-google-chrome-driver)

### Commands

The two installation commands shares similar signatures, something like this:

```bash
./google-for-testing install:<browser|driver> [options]
```

There are three options available to change the way the command works.

- **`--ver=[VER]`**:
This option by default is set to `115.0.5763.0` in both commands.
    > **Note**:
    For the `install:driver` command, the default version it's really important, this is the started version from where you can get
    the `chromedriver` binary, before that version, we don't have access to it (for now).

- **`--latest`**:
This option will download the latest version.

- **`--path=[PATH]`**:
This will let you choose where to download it.

> **Note**:
> The default location for every download is `$HOME/.google-for-testing`

<br>

#### Install Google Chrome Browser

The syntax for to install Google Chrome Browser is the next one:

```bash
./google-for-testing install:browser [options]
```

Running this command without any option, will download the default version `115.0.5763.0`, but you can choose
any other version to download (if is available).

You can check the available versions on this [API endpoint](https://googlechromelabs.github.io/chrome-for-testing/known-good-versions.json) 👈

<br>

#### Install Google Chrome Driver

The syntax for to install Google Chrome Driver is the next one:

```bash
./google-for-testing install:driver [options]
```

Running this command without any option, will download the default version `115.0.5763.0`, but you can choose
any other version to download (if is available).

> **Note**: You can check the available versions on this [API endpoint](https://googlechromelabs.github.io/chrome-for-testing/known-good-versions.json) 👈, but keep in mind
> that for `chromedriver` the versions starts at `115.0.5763.0`, so any version below that we will not have access to the binary download link (for now).

---

## License

**Google for Testing - CLI** is an open-source software licensed under the [MIT license](./LICENSE.md).
