# WIPRIM Real Estate Admin Panel
WIPRIM's Real Estate Admin Panel allows administrators and assigned managers to:

- Manage Properties and apartments (referred to as **Premises**) under the company
- Manage all Tenants (referred to as **Users**) and their respective accounts
- Calculate respective rents for all **Houses** per **Property**
- Provide analytical data of all paid rents for each **User** who occupies a **Premise** on the respective **Property**.
- Generate Payment Schedules for each respective **User** as agreed upon on their **Tenancy Agreement**
- Generate Premise Bill cumulative statistics and reports (Water, Garbage, etc.)

## Installation Instructions
1. Ensure the following are installed on your machine before proceeding:
    - [Git CLI](https://git-scm.com/downloads)
    - [PHP](https://windows.php.net/download#php-8.0) (Version 8.0)
    - [Composer](https://getcomposer.org/download/)
    - [Node JS](https://nodejs.org/en/download)
      <br><br>
2. Download the [Shell Script](https://github.com/ari3skin/WIPRIM-RealEstate-System/blob/master/admin/setup.sh) by using the Download raw file option

    - **For Linux and Mac:**
        1. Open a terminal window.
        2. Navigate to the directory where you downloaded the `setup.sh` file.
        3. Run the following command to make the script executable:
           ```
           chmod +x setup.sh
           ```
        4. Run the script with:
           ```
           ./setup.sh
           ```

    - **For Windows:**
        - If you are using Git Bash or another Bash-compatible shell:
            1. Open Git Bash or your preferred Bash-compatible terminal.
            2. Navigate to the directory where you downloaded the `setup.sh` file.
            3. Run the script with:
               ```
               bash setup.sh
               ```

        - If you are using Command Prompt or PowerShell without a Bash-compatible shell, you may need to manually execute the commands inside the `setup.sh` file or convert it to a batch file.


## Required Libraries
Our project owes much to the following open-source resources that greatly facilitated its development:

- [Composer](https://getcomposer.org/): A tool for managing PHP dependencies.
- [Laravel](https://laravel.com/): A PHP web framework offering elegant, expressive syntax.
- [Laravel Socialite](https://laravel.com/docs/socialite): An official Laravel package providing OAuth authentication with various providers, including Google.
- [Git CLI](https://git-scm.com/): An open-source version control system that effectively handles small to large projects.

## License

This project is licensed under the MIT License - see the [LICENSE.md](../LICENSE.md) file for details.

## Support

For support, please contact us at [support@wipriminvestments.com](mailto:support@wipriminvestments.com).
