wp-cli/super-admin-command
==========================

Manage super admins on WordPress multisite.

[![Build Status](https://travis-ci.org/wp-cli/super-admin-command.svg?branch=master)](https://travis-ci.org/wp-cli/super-admin-command)

Quick links: [Using](#using) | [Installing](#installing) | [Contributing](#contributing)

## Using

This package implements the following commands:

### wp super-admin add

Grant super admin privileges to one or more users.

~~~
wp super-admin add <user>...
~~~

**OPTIONS**

	<user>...
		One or more user IDs, user emails, or user logins.

**EXAMPLES**

    $ wp super-admin add superadmin2
    Success: Granted super-admin capabilities.



### wp super-admin list

List users with super admin capabilities.

~~~
wp super-admin list [--format=<format>]
~~~

**OPTIONS**

	[--format=<format>]
		Render output in a particular format.
		---
		default: list
		options:
		  - list
		  - table
		  - csv
		  - json
		  - count
		  - yaml
		---

**EXAMPLES**

    # List user with super-admin capabilities
    $ wp super-admin list
    supervisor
    administrator



### wp super-admin remove

Remove super admin privileges from one or more users.

~~~
wp super-admin remove <user>...
~~~

**OPTIONS**

	<user>...
		One or more user IDs, user emails, or user logins.

**EXAMPLES**

    $ wp super-admin remove superadmin2
    Success: Revoked super-admin capabilities.

## Installing

This package is included with WP-CLI itself, no additional installation necessary.

To install the latest version of this package over what's included in WP-CLI, run:

    wp package install git@github.com:wp-cli/super-admin-command.git

## Contributing

We appreciate you taking the initiative to contribute to this project.

Contributing isn’t limited to just code. We encourage you to contribute in the way that best fits your abilities, by writing tutorials, giving a demo at your local meetup, helping other users with their support questions, or revising our documentation.

### Reporting a bug

Think you’ve found a bug? We’d love for you to help us get it fixed.

Before you create a new issue, you should [search existing issues](https://github.com/wp-cli/super-admin-command/issues?q=label%3Abug%20) to see if there’s an existing resolution to it, or if it’s already been fixed in a newer version.

Once you’ve done a bit of searching and discovered there isn’t an open or fixed issue for your bug, please [create a new issue](https://github.com/wp-cli/super-admin-command/issues/new) with the following:

1. What you were doing (e.g. "When I run `wp post list`").
2. What you saw (e.g. "I see a fatal about a class being undefined.").
3. What you expected to see (e.g. "I expected to see the list of posts.")

Include as much detail as you can, and clear steps to reproduce if possible.

### Creating a pull request

Want to contribute a new feature? Please first [open a new issue](https://github.com/wp-cli/super-admin-command/issues/new) to discuss whether the feature is a good fit for the project.

Once you've decided to commit the time to seeing your pull request through, please follow our guidelines for creating a pull request to make sure it's a pleasant experience:

1. Create a feature branch for each contribution.
2. Submit your pull request early for feedback.
3. Include functional tests with your changes. [Read the WP-CLI documentation](https://wp-cli.org/docs/pull-requests/#functional-tests) for an introduction.
4. Follow the [WordPress Coding Standards](http://make.wordpress.org/core/handbook/coding-standards/).


*This README.md is generated dynamically from the project's codebase using `wp scaffold package-readme` ([doc](https://github.com/wp-cli/scaffold-package-command#wp-scaffold-package-readme)). To suggest changes, please submit a pull request against the corresponding part of the codebase.*
