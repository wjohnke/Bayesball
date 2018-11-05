package com.company;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Main {

    public static void main(String[] args) {
	// write your code here
//        System.setProperty("webdriver.chrome.driver","C:\\Users\\44255\\OneDrive\\Documents\\GitHub\\BayesBall" +
//                "\\Selenium\\chromedriver_win32\\chromedriver.exe");
        System.setProperty("webdriver.chrome.driver","../Selenium/chromedriver_win32/chromedriver.exe");

        System.out.println("hello");
        WebDriver obj= new ChromeDriver();
        obj.get("https://www.missouri.edu");
    }
}
