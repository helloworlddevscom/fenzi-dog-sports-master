import { loginUser } from "@wordpress/e2e-test-utils";

it("verifies the plugin is active", async () => {
  // login as admin
  await loginUser();

  // visit the plugins page
  // assert that our plugin is active by checking the HTML
});

// it("verifies the plugin is active", async () => {
//   // login as admin
//   await activatePlugin("fenzi-hwd-store");
// });
