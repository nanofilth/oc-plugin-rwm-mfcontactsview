# oc-plugin-rwm-mfcontactsview

**Depends** 
- Magic Forms Plugin https://github.com/skydiver/october-plugin-forms

**Beta** 
- Depends on PR: https://github.com/skydiver/october-plugin-forms/pull/63 in Magic Forms, which allows the plugin to extend it through OC Events.

### What
This plugin extends october-plugin-forms with custom, input-specific backend views and management. 
This is useful in cases where you would like to use magic forms for the frontend form construction, but need more control over the backend display and management of the input fields. 

In this particular implement, magic forms builds a routine frontend contact form (name, email, subject, message) and its input is diverted to this plugin for backend review. 


### Next Steps

This plugin presents a simple use-case, but - using the usual October dev processes - it's a pretty trivial task to fill more robust specs.   