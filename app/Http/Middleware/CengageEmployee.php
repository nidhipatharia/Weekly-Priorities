<?php

namespace app\Http\Middleware;

use Closure;

class CengageEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $email = $request->input('email');

        $password = $request->input('password');

        # using ldap bind
        $ldaphost = "ohcindcgroup.corp.local";
        $ldapport = "3268"; 
        
        # connect to ldap server
        $ldapconn = ldap_connect($ldaphost,$ldapport);
        
        # Set some ldap options for talking to
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
        
        # IF LDAP CONNECTION MADE - AND USER LOGIN/PASSWORD FOUND, SWITCH TO "AUTH=1"
        if ($ldapconn) {
            # binding to ldap server
            $ldapbind = @ldap_bind($ldapconn, $email, $password);
        
            # verify binding
            if (!$ldapbind) {
                
                return redirect("/")->withErrors("Invalid Username and/or password");
            }
        
        } // end ldapconn
        
        
        return $next($request);
    }
}
